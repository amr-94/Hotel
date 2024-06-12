@extends('layouts.dashboard')
@section('title', 'Edit Booking')
@section('content')
    @component('components.errors_component')
    @endcomponent
    <h1>Edit Booking for {{ $booking->room->type }} Room</h1>
    <div class="container">
        <form action="{{ route('bookings.update', $booking->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="start_date" class="form-label">start date</label>
                <input type="date" name="start_date" id="start_date" class="form-control"
                    value="{{ $booking->start_date }}">
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">end date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $booking->end_date }}">
            </div>

            <div class="mb-12">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected value="">Select Status</option>
                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $booking->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <div class="mb-12">
                <label for="type" class="form-label">If you want to change the room </label>
                <select class="form-select" aria-label="Default select example" name="type">
                    <option selected>Select Type</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" {{ $room->id == $booking->room_id ? 'selected' : '' }}>
                            {{ $room->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">confirm updated ? </button>
            </div>
        </form>
    </div>

@endsection
