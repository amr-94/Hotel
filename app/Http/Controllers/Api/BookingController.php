<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = booking::all();
        return $bookings;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {
        // Find the room by ID
        $room = Room::find($id);

        // Check if room exists
        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }

        // Check if the room is available
        if ($room->status !== 'available') {
            return response()->json(['message' => 'Room is not available'], 400);
        }

        // Create a new booking
        $booking = booking::create([
            'user_id' => Auth::user()->id,
            'room_id' => $id,
            'status' => 'pending',
            'start_date' => now(),
            'end_date' => now()->addDays(1),
        ]);
        $room->status = 'pending';
        $room->save();

        return response()->json(['booking' => $booking, 'message' => 'Booking created successfully'], 201);
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = booking::find($id);
        return $booking;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = booking::find($id);
        $booking->delete();
        return $booking;
    }
}