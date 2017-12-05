<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        

        <!-- Styles -->
<!--        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <link rel="stylesheet" href ="{{ asset('css/app.css') }}">
        <link rel=stylesheet href ="\css\bootstrp.min.css">
        <script src="\js\jquery-1.9.min.js"></script>
        <script src="\js\bootstrap.min.js"></script>
        <link rel="stylesheet" href="/static/bootstrap.css" type="text/css">

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
        <script  href="/static/bootstrap.js"></script>
-->
        <title>Subscription Project</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles 
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">  -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"   rel="stylesheet">
        <!-- Styles -->
        <style>


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

            .versioninfo {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }

            .framwork_title {
                font-weight: 600;
                padding-top: 20px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{ url('/') }}">Subscription Project</a> 
                    </div>
                        
                                <ul class="nav navbar-nav">
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                </ul>                       

                </div>
            </nav>
            @yield('content')
        </div>

        <!-- Scripts 
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script> -->
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>          
    </body>
</html>
