@extends('layouts.dashboard')
@section('title', 'Room Details')
@section('content')
    @component('components.alert_component')
    @endcomponent
    @component('components.errors_component')
    @endcomponent
    <button class="btn btn-dark mb-3"><a href="{{ route('rooms.create') }}">Add Room</a></button>

    <div class="row">
        <div class="col-md-12 mb-12">
            <div class="card">
                <a href="{{ route('rooms.show', $room->id) }}">
                    <img src="{{ asset("filles/rooms/$room->image") }}" class="card-img-top" alt="..."
                        style="height: 100%">
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('rooms.show', $room->id) }}">{{ $room->name }}</a>
                    </h5>
                    <p class="card-text">Description: {{ $room->description }}</p>
                    <p class="card-text">Type: {{ $room->type }}</p>
                    <p class="card-text">Status: {{ $room->status }}</p>
                    <div class="card-footer mb-2">
                        <div class="d-flex justify-content-between">
                            <p class="card-text mb-5">Created since {{ $room->created_at->diffForHumans() }}</p>
                            <p class="card-text mb-5">Last updated since {{ $room->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between ">
                        <a class="btn btn-primary" href="{{ route('rooms.edit', $room->id) }}">Edit</a>
                        @if (Auth::user()->id !== $room->user_id)
                            <form action="{{ route('bookings.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <button class="btn btn-light">Book</button>
                            </form>
                        @endif
                        <form action="{{ route('rooms.destroy', $room->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
