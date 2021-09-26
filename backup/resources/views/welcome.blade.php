<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Japware.com</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Bootstrap core CSS-->
        <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: url('../image/welcome.jpg');
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .links .btn-outline-secondary{
                margin-right: 30px;
                padding: 12px;
                padding-left: 40px;
                padding-right: 40px;
                font-size: 21px;
                font-weight: 700;
                border-radius: 7px;
                border: 2px solid;
                margin-top: -20px;
            }
            .helpline {
                margin-top: 28px;
                color: #f30d0d;
                font-size: xx-large;
                font-weight: 700;
            }
            #newuser{
                /*margin-left: -20px !important;*/
                color: #e61010 !important; 
                font-size: medium !important;
                padding-left: 40px !important;
            }
            .ex {
                /*margin-left: -20px !important;*/
                color: #e61010 !important; 
                font-size: medium !important;
                padding-left: 62px !important;
            }
        </style>
    </head>
    <body >
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))

            @if (Auth::check())
            <div class="top-right links">
                <!-- <a href="{{ url('/home') }}">Home</a> -->
                <a href="{{ url('user/logout') }}">Logout</a>
            </div>
            <div class="content">
                <div class="title m-b-md">
                    JAPWARE TECHNO LAB
                </div>
            </div>
            @else
            <div class="content">
                <div class="title m-b-md">
                    JAPWARE TECHNO LAB
                </div>
                <div class="links">
                    <a class="btn btn-outline-secondary" href="{{ url('/studio_Register') }}">REGISTER</a>
                    <a class="btn btn-outline-secondary" href="{{ url('/studio_Login') }}">LOGIN</a>
                    <br/><a id="newuser">New User</a><a class="ex">Existing User</a>
                    
                </div>
                <div class="helpline"><span>Helpline Number: 7434977999 <span></div>
            </div>
            @endif

            @endif

        </div>
    </body>

</html>
