@extends('layouts.dashboard')
@section('title', 'All Rooms')
@section('content')
    @component('components.alert_component')
    @endcomponent
    <button class="btn btn-dark mb-3"><a href="{{ route('rooms.create') }}">Add Room</a></button>

    <div class="row">
        @foreach (Auth::user()->rooms as $room)
            <div class="col-md-4 mb-3">
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
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
