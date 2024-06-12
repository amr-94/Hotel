@extends('layouts.front_layout')
@section('content')
    <div class="section_title text-center">
        <h2 class="title_color">Hotel</h2>
        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
    </div>
    <div class="row mb_30">
        @foreach ($rooms as $room)
            <div class="col-lg-3 col-sm-6">
                <div class="accomodation_item text-center">
                    <div class="hotel_img">
                        <img src="{{ asset('filles/rooms/' . $room->image) }}" alt="" width="100%" height="100%">
                        <a href="{{ route('front.show', $room->id) }}">
                            <button class="btn theme_btn button_hover">Book Now</button>
                        </a>
                    </div>
                    <a href="#">
                        <h4 class="sec_h4">{{ $room->type }}</h4>
                    </a>
                    <h5>Status : {{ $room->status }}</h5>
                    <h5>User : {{ $room->user->name }}</h5>
                </div>
            </div>
        @endforeach
    </div>
@endsection
