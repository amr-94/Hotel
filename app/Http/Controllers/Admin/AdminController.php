<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function allbookrequest()
    {
        $rooms = Room::where('user_id', auth()->user()->id)->pluck('id');

        if (auth()->user()->type === 'admin') {
            $bookings = Booking::all();
        } else {
            $bookings = Booking::whereIn('room_id', $rooms)->orwhere('user_id', auth()->user()->id)->get();
        }
        return view('dashboard.user.bookrequest', compact('bookings'));
    }

    public function updatestatus(Request $request, $id)
    {
        $booking = booking::find($id);
        if ($request->Approve) {
            $booking->update(['status' => 'approved']);
        } else {
            $booking->update(['status' => 'rejected']);
        }
        $room = Room::find($booking->room_id);
        if ($request->Approve) {
            $room->status = 'booked';
        } else {
            $room->status = 'available';
        }
        $room->save();
        return redirect()->route('All.bookrequest')->with('status', 'Book request accepted');
    }

    public function deletebookrequest($id)
    {
        $booking = booking::find($id);
        $booking->delete();
        return redirect()->route('All.bookrequest')->with('status', 'Book request deleted');
    }

    public function allusers()
    {
        $users = User::all();
        return view('dashboard.user.Alluser', compact('users'));
    }

    public function updateuser(Request $request, $id)
    {
        $user = User::find($id);
        $user->update(['type' => $request->type]);
        return redirect()->route('All.users')->with('status', 'User updated');
    }

    public function deleteuser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('All.users')->with('status', 'User deleted');
    }
}