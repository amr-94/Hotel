<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('image/favicon.png" type="image/png') }}">
    <title>{{ config('app.name') }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>

<body>
    <!--================Header Area =================-->
    <header class="header_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="image/Logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
                        @guest
                            <li class="nav-item active"><a class="nav-link" href="/login">Login</a></li>
                            <li class="nav-item active"><a class="nav-link" href="/register">Register</a></li>
                        @endguest
                        @auth
                            @if (auth()->user()->type == 'admin' || auth()->user()->type == 'employee')
                                <li class="nav-item active"><a class="nav-link"
                                        href="{{ route('rooms.index') }}">Dashboard</a>
                                </li>
                            @endif
                            <ul class="">user
                                <li class=""><a class="" href="{{ route('front.index') }}">
                                        name : {{ Auth::user()->name }}</a>
                                </li>
                                <li class=""><a class="" href="{{ route('front.index') }}">
                                        type : {{ Auth::user()->type }}</a>
                                </li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <button class="btn btn-outline-danger btn-sm" type="submit">Logout</button>
                                </form>
                            </ul>
                        @endauth

                </div>
            </nav>
        </div>
    </header>

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h6>Away from monotonous life</h6>
                    <h2>Relax Your Mind</h2>
                    <p>If you are looking at blank cassettes on the web, you may be very confused at the<br> difference
                        in price. You may see some for as low as $.17 each.</p>
                    <a href="#" class="btn theme_btn button_hover">Get Started</a>
                </div>
            </div>
        </div>
        <div class="hotel_booking_area position">
            <div class="container">
                <div class="hotel_booking_table">
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

                                    <div class="col-md-4">
                                        <div class="book_tabel_item">
                                            <div class="input-group">
                                                <select class="wide" name="room_id">
                                                    <option>type of Rooms</option>
                                                    @foreach ($rooms as $room)
                                                        <option value="{{ $room->id }}">{{ $room->type }}
                                                        </option>
                                                    @endforeach
                                                </select>
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
        </div>
    </section>
    <!--================Banner Area =================-->

    <!--================ Accomodation Area  =================-->
    <section class="accomodation_area section_gap">
        <div class="container">
            @yield('content')
        </div>
    </section>
    <!--================ Accomodation Area  =================-->




    <!--================ start footer Area  =================-->
    <footer class="footer-area section_gap">

    </footer>
    <!--================ End footer Area  =================-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/mail-script.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('vendors/nice-select/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('js/mail-script.js') }}"></script>
    <script src="{{ asset('js/stellar.js') }}"></script>
    <script src="{{ asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
