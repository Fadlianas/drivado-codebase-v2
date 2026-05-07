<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Agency;

class BookingController extends Controller
{
    public function search(Request $request)
    {
        $query = Vehicle::with('agency')->where('is_available', true);

        if ($request->filled('location')) {
            $query->whereHas('agency', function($q) use ($request) {
                $q->where('city', 'like', '%' . $request->location . '%');
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('min_price')) {
            $query->where('price_per_day', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price_per_day', '<=', $request->max_price);
        }

        $vehicles = $query->paginate(9);
        
        return view('search', compact('vehicles'));
    }

    public function show($id)
    {
        $vehicle = Vehicle::with(['agency', 'photos'])->findOrFail($id);
        return view('detail', compact('vehicle'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $vehicle = Vehicle::with('agency')->findOrFail($request->vehicle_id);
        
        $start = \Carbon\Carbon::parse($request->start_date);
        $end = \Carbon\Carbon::parse($request->end_date);
        $days = $start->diffInDays($end);
        
        $subtotal = $days * $vehicle->price_per_day;
        $commission_rate = config('app.commission_rate', 10);
        $commission_amount = ($subtotal * $commission_rate) / 100;
        $total = $subtotal + $commission_amount;

        $booking_data = [
            'vehicle_id' => $vehicle->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'days' => $days,
            'subtotal' => $subtotal,
            'commission_rate' => $commission_rate,
            'commission_amount' => $commission_amount,
            'total' => $total,
        ];

        return view('checkout', compact('vehicle', 'booking_data'));
    }

    public function confirm(Request $request)
    {
        // This would normally integrate with Stripe here
        // For now, we'll create the booking as 'confirmed' to simulate success
        
        $booking = \App\Models\Booking::create([
            'user_id' => auth()->id(),
            'vehicle_id' => $request->vehicle_id,
            'agency_id' => $request->agency_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_days' => $request->days,
            'subtotal' => $request->subtotal,
            'commission_rate' => $request->commission_rate,
            'commission_amount' => $request->commission_amount,
            'total_amount' => $request->total,
            'status' => 'confirmed',
        ]);

        return redirect()->route('booking.success', $booking->id);
    }

    public function success($id)
    {
        $booking = \App\Models\Booking::with(['vehicle', 'agency'])->findOrFail($id);
        return view('success', compact('booking'));
    }
}
