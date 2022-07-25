<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

         <div class="container" >
             <div class="row">
                        <div class="col-lg-8" style="margin:auto;">
                            <div style="margin-top:15px; " id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                        <div class="carousel-item active" data-bs-interval="100">
                                        <img src="{{ asset('img/img01.png') }}" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <div class="title m-b-md" style="color: red">
                                                LaravelShop E-Commerce
                                            </div>
                                            <div class="links" >
                                                <a style="color: rgb(43, 97, 245)" href="{{ route('products.index') }}">Visiter la boutique! </a>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="carousel-item" data-bs-interval="200">
                                        <img src="{{ asset('img/img04.png') }}" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <div class="title m-b-md" style="color: red">
                                                LaravelShop E-Commerce
                                            </div>
                                            <div class="links" >
                                                <a style="color: rgb(43, 97, 245)" href="{{ route('products.index') }}">Visiter la boutique! </a>
                                            </div>
                                        </div>
                                        </div>

                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="carousel-item">
                                    <img src="{{ asset('img/img08.png') }}" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <div class="title m-b-md" style="color: red">
                                            LaravelShop E-Commerce
                                        </div>
                                        <div class="links" >
                                            <a style="color: rgb(43, 97, 245)" href="{{ route('products.index') }}">Visiter la boutique! </a>
                                        </div>
                                    </div>
                                 </div>
                     </div>

            </div>


            <div class="col-lg-4">

                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif


            </div>

        </div>


         <script  src="{{ asset('bootstrap/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="'{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
    </body>
</html>
