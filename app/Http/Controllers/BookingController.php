<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('room')->get();
        return view('dashboard.booking.index', compact('bookings'));
    }
    public function store(BookingRequest $request)
    {
        $user = Auth::user();
        $room = Room::find($request->room_id);
        if ($room->status === 'available') {
            if ($request->start_date !== null && $request->end_date !== null) {
                $booking = Booking::create([
                    'room_id' => $room->id,
                    'user_id' => $user->id,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'status' => 'pending',
                ]);
            } else {
                $booking = Booking::create([
                    'room_id' => $room->id,
                    'user_id' => $user->id,
                    'start_date' => now(),
                    'end_date' => now()->addDays(1),
                    'status' => 'pending',
                ]);
            }
            $room->update(['status' => 'pending']);
            return redirect()->route('rooms.show', $room->id)->with('success', 'Booking request submitted successfully');
        } else {
            return redirect()->route('rooms.show', $room->id)->with('error', 'Room is not available');
        }
    }
    public function edit($id)
    {
        $booking = Booking::find($id);
        $rooms = Room::all();
        return view('dashboard.booking.edit', compact('booking', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->update($request->all());
        return redirect()->route('bookings.index')->with('success', 'Booking request updated successfully');
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking request deleted successfully');
    }
}