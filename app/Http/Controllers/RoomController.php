<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->query('search');
        $rooms = Room::whereAny(['type', 'status'], 'like', "%$search%")->paginate(10);

        return view('dashboard.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        // try {
        if ($request->hasFile('R_image')) {
            $imageName = time() . '.' . $request->R_image->getClientOriginalExtension();
            $request->R_image->move(public_path('filles/rooms'), $imageName);
            $request->merge([
                'image' => $imageName
            ]);
        }


        Room::create($request->all());

        return redirect()->route('rooms.index')->with('status', 'Room created successfully!');
        // } catch (\Exception $e) {
        //     Log::error('Error storing room: ' . $e->getMessage());
        // return redirect()->back()->withErrors('Error storing room: ' . $e->getMessage());
    }



    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('dashboard.rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $room = Room::find($id);
        return view('dashboard.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, $id)
    {
        if ($request->hasFile('R_image')) {
            $imageName = time() . '.' . $request->R_image->getClientOriginalExtension();
            $request->R_image->move(public_path('filles/rooms'), $imageName);
            $request->merge([
                'image' => $imageName
            ]);
        }
        $room = Room::find($id);
        $room->update($request->all());
        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room = Room::find($room->id);
        $room->delete();
        return redirect()->route('rooms.index');
    }
}
