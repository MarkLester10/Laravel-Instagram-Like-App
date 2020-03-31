<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','CapTure')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                font-family: 'Montserrat', sans-serif;
                height: 100vh;
                margin: 0;
                color: #212121;
            }

            .full-height {
                height: 100vh;
                position: relative;
                overflow: hidden;
            }
            .images{
                position: absolute;
                z-index: -1;
                opacity: .8;
                border-radius: 5px;
                box-shadow: 10px 30px 30px rgba(0, 0, 0, 0.14);
            }

            .images.im1{
                transform: rotate(-25deg);
                left: -50px;
                top:-20px;
                width:450px;
            }

            .images.im2{
                transform: rotate(25deg);
                right: -65px;
                bottom:-20px;
                width:450px;
            }

            
            .images.im3{
                top: 0;
                width:450px;
                opacity: .5;
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
                bottom: 50px;
                color: #212121;
            }

            .content {
                text-align: center;
                z-index: 900;
                box-shadow: 15px 35px 35px rgba(0, 0, 0, 0.14);
                width: 50%;
            }

        .logo{
                width: 300px;
            }

            .title {
                font-size: 84px;
                font-weight: 900;
            }

            .title span:first-child{
                color: #BA68C8;
            }

            .title span:last-child{
                color:  #FF4081;
            }

            .links > a {
                color: #212121;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                border: 1px solid #000;
                padding: 10px 15px;
            }

            .links > a.active{
                color: #fff;
                background: #000;
            }

            .jumbotron{
                font-size: 20px;
                width: 100%;
                font-weight: 200;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

       
                <img class="images im1" src="/img/cap1.jpg" alt="">
                <img class="images im2" src="/img/cap2.jpg" alt="">
                <img class="images im3" src="/img/big.jpg" alt="">

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="active" href="{{ url('/profile/' . auth()->user()->id) }}">Profile</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="active" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <img class="logo" src="/img/logo.png" alt="">
                <div class="title m-b-md">
                   <span>Cap</span><span>Ture</span>
                </div>

                <div class="jumbotron d-flex">
                  <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem quaerat itaque quisquam natus, voluptatem odio.</p>
                </div>
            </div>
        </div>
    </body>
</html>
