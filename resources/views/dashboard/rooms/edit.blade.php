@extends('layouts.dashboard')
@section('title', 'Edit Room')
@section('content')
    @component('components.errors_component')
    @endcomponent
    <div class="container">
        <form action="{{ route('rooms.update', $room->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $room->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="R_image" class="form-control" id="image">
            </div>
            <div class="mb-12">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected value="">Select Status</option>
                    <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="booked" {{ $room->status == 'booked' ? 'selected' : '' }}>Booked</option>
                    <option value="pending" {{ $room->status == 'pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>
            <div class="mb-12">
                <label for="type" class="form-label">Type of this room</label>
                <select class="form-select" aria-label="Default select example" name="type">
                    <option selected>Select Type</option>
                    <option value="single" {{ $room->type == 'single' ? 'selected' : '' }}>Single</option>
                    <option value="double" {{ $room->type == 'double' ? 'selected' : '' }}>Double</option>
                    <option value="suite" {{ $room->type == 'suite' ? 'selected' : '' }}>Suite</option>
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit </button>
            </div>
        </form>
    </div>

@endsection
