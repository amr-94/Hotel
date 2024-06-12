@extends('layouts.front_layout')
@section('content')
    <div class="row mb_30">
        <div class="col-lg-12 col-sm-6">
            <div class="accomodation_item text-center">
                <div class="hotel_img">
                    <img src="{{ asset('filles/rooms/' . $room->image) }}" alt="" width="100%" height="100%">
                    @if ($room->status == 'available' && Auth::check() && in_array(Auth::user()->type, ['client', 'admin']))
                        <form action="{{ route('bookings.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <button class="btn theme_btn button_hover">Book Now</button>
                        </form>
                    @else
                        <button class="btn theme_btn button_hover">UnAvailable</button>
                    @endif
                </div>
                <a href="#">
                    <h4 class="sec_h4">{{ $room->type }}</h4>
                </a>
                <h5>Status : {{ $room->status }}</h5>
                <h5>User : {{ $room->user->name }}</h5>
            </div>
        </div>
    </div>
    <section class="hotel_booking_area">
        <div class="container">
            <div class="row hotel_booking_table">
                <div class="col-md-3">
                    <h2>Book<br> Your Room</h2>
                </div>
                <div class="col-md-9">
                    <form action="{{ route('bookings.store') }}" method="post">
                        @csrf
                        {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}
                        <div class="boking_table">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="book_tabel_item">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <div class='input-group date'>
                                                <input type='date' class="form-control" name="start_date" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>
                                            <div class='input-group date'>
                                                <input type='date' class="form-control" name="end_date"
                                                    placeholder="End Date" />
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @auth
                            <button class="btn btn-primary" type="submit">Book Now</button>
                        @endauth
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
