@extends('layouts.dashboard')
@section('title', 'Create Room')
@section('content')
    @component('components.errors_component')
    @endcomponent
    <div class="container">
        <form action="{{ route('rooms.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="R_image" class="form-control" id="image">
            </div>
            <div class="mb-12">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option selected value="">Select Status</option>
                    <option value="available">Available</option>
                    <option value="booked">Booked</option>
                    <option value="pending">Pending</option>
                </select>
            </div>
            <div class="mb-12">
                <label for="type" class="form-label">Type of this room</label>
                <select class="form-select" aria-label="Default select example" name="type">
                    <option selected>Select Type</option>
                    <option value="single">Single</option>
                    <option value="double">Double</option>
                    <option value="suite">Suite</option>
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit </button>
            </div>
        </form>
    </div>

@endsection
