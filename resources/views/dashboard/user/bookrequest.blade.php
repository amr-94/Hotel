@extends('layouts.dashboard')
@section('title', 'All Bookings')
@section('content')
    @component('components.alert_component')
    @endcomponent
    <button class="btn btn-dark mb-3"><a href="{{ route('bookings.create') }}">Add Booking</a></button>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>status</th>
                    <th>room_type</th>
                    <th>request user</th>
                    <th>Room user name</th>
                    <th>start_date</th>
                    <th>end_date</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>{{ $booking->room->type }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->room->user->name }}</td>
                        <td>{{ $booking->start_date }}</td>
                        <td>{{ $booking->end_date }}</td>
                        <td>{{ $booking->created_at->diffforhumans() }}</td>
                        <td>{{ $booking->updated_at->diffforhumans() }}</td>
                        <td>
                            @if (Auth::user()->id == $booking->room->user_id || (Auth::user()->type == 'admin' && $booking->status == 'pending'))
                                <form action="{{ route('update.request.status', $booking->id) }}" method="POST">
                                    @csrf

                                    @method('put')
                                    <input type="submit" name="Approve" value="Approve" class="btn btn-outline-success btn-sm">

                                    </input>
                                    <input type="submit" name="Reject" value="Reject"
                                        class="btn btn-outline-danger btn-sm">

                                    </input>
                                </form>
                            @endif
                        </td>
                        <td>
                            @if (Auth::user()->id == $booking->room->user_id ||
                                    Auth::user()->type == 'admin' ||
                                    Auth::user()->id == $booking->user_id)
                                <form action="{{ route('delete.bookrequest', $booking->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
