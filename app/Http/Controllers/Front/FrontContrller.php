<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class FrontContrller extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('front.index', compact('rooms'));
    }

    public function show($id)
    {
        $room = Room::find($id);
        return view('front.show', compact('room'));
    }
}