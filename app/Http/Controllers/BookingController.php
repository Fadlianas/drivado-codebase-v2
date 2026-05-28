<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Booking;
use Carbon\Carbon;

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
        
        $booking_data = $this->calculateBookingData(
            $vehicle,
            $request->start_date,
            $request->end_date
        );

        $booking_data['vehicle_id'] = $vehicle->id;

        return view('checkout', compact('vehicle', 'booking_data'));
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $vehicle = Vehicle::with('agency')->where('is_available', true)->findOrFail($request->vehicle_id);
        $booking_data = $this->calculateBookingData(
            $vehicle,
            $request->start_date,
            $request->end_date
        );

        // Payment is simulated for the academic demo; all financial fields are still server-calculated.
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'vehicle_id' => $vehicle->id,
            'agency_id' => $vehicle->agency_id,
            'start_date' => $booking_data['start_date'],
            'end_date' => $booking_data['end_date'],
            'total_days' => $booking_data['days'],
            'subtotal' => $booking_data['subtotal'],
            'commission_rate' => $booking_data['commission_rate'],
            'commission_amount' => $booking_data['commission_amount'],
            'total_amount' => $booking_data['total'],
            'status' => 'confirmed',
        ]);

        return redirect()->route('booking.success', $booking->id);
    }

    public function success($id)
    {
        $booking = Booking::with(['vehicle', 'agency'])->findOrFail($id);
        $user = auth()->user();

        abort_unless(
            $booking->user_id === $user->id ||
            $user->role === 'admin' ||
            ($user->role === 'agency' && $user->agency?->id === $booking->agency_id),
            403
        );

        return view('success', compact('booking'));
    }

    private function calculateBookingData(Vehicle $vehicle, string $startDate, string $endDate): array
    {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        $days = (int) $start->diffInDays($end);
        $subtotal = $days * $vehicle->price_per_day;
        $commission_rate = config('app.commission_rate', 10);
        $commission_amount = ($subtotal * $commission_rate) / 100;

        return [
            'start_date' => $start->toDateString(),
            'end_date' => $end->toDateString(),
            'days' => $days,
            'subtotal' => $subtotal,
            'commission_rate' => $commission_rate,
            'commission_amount' => $commission_amount,
            'total' => $subtotal + $commission_amount,
        ];
    }
}
