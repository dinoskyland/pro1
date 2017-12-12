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
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"   rel="stylesheet"> -->
        <link rel="stylesheet" href="../clismas/bootstrap/css/bootstrap.min.css">
        
        <!--
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/css/AdminLTE.css"   >
        -->
        <!-- tables -->
        <link rel="stylesheet" href="../clismas/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="../clismas/dist/css/AdminLTE.min.css">

        <link rel="stylesheet" href="../clismas/dist/css/skins/_all-skins.min.css">

        <!-- Morris chart -->
        <link rel="stylesheet" href="../clismas/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="../clismas/plugins/jvectormap/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="../clismas/plugins/datepicker/bootstrap-datepicker.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../clismas/plugins/daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="../clismas/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


        <!-- Font Awesome 
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons 
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css"> -->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


        
        
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
                                    <li class="active"><a href="{{ url('/home') }}">Home</a></li>
                                    <li><a href="{{route('sub_sum')}}">Subscription prcess</a></li>
                                    <li><a href="{{route('euser')}}">Users</a></li>
                                    <li class="dropdown">
                                         <a class="dropdown-toggle" data-toggle="dropdown" href="#">Product Features process
                                        <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{route('product')}}">Product </a></li>
                                                <li><a href="{{route('package')}}">Package</a></li>                                       
                                                <li><a href="{{route('rate_plan')}}">Rate Plan</a></li>                                       

                                        </ul>    
                                    </li>                                    


                                    <li class="dropdown">
                                         <a class="dropdown-toggle" data-toggle="dropdown" href="#">Basic information process
                                        <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                                <li><a href="{{route('time_unit')}}">Time Unit</a></li>
                                                <li><a href="{{route('payment_type')}}">Payment Type</a></li>                                       
                                        </ul>    
                                    </li>                                    
                                </ul>
                        
                                <ul class="nav navbar-nav navbar-right">                     
                                    @if (Auth::guest())
                                        <li><a class="navbar-item " href="{{ route('login') }}">Login</a></li>
                                        <li><a class="navbar-item " href="{{ route('register') }}">Register</a></li>
                                    @else                                       
                                        <li><a class="navbar-link" href="#">{{ Auth::user()->name }}</a></li>                                           
                                        <li><a class="navbar-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    Logout
                                            </a></li>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    {{ csrf_field() }}
                                        </form>                                                                                  
                                    @endif
                                    
                                </ul>

                </div>
            </nav>
            @yield('content')
        </div>

        <!-- Scripts 
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script> -->
        <!--
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        -->
        <!--  
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>       
        -->  
        <!-- 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/js/adminlte.min.js"></script>  -->


            <!-- jQuery 2.2.3 -->
            <script src="../clismas/plugins/jQuery/jquery-2.2.3.min.js"></script>
            <!-- Bootstrap 3.3.6 -->
            <script src="../clismas/bootstrap/js/bootstrap.min.js"></script>
            <!-- DataTables -->
            <script src="../clismas/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="../clismas/plugins/datatables/dataTables.bootstrap.min.js"></script>
            <!-- SlimScroll -->
            <script src="../clismas/plugins/slimScroll/jquery.slimscroll.min.js"></script>
            <!-- FastClick -->
            <script src="../clismas/plugins/fastclick/fastclick.js"></script>
            <!-- AdminLTE App -->
            <script src="../clismas/dist/js/app.min.js"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <!-- Bootstrap WYSIHTML5 -->
            <script src="../clismas/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
            
            <script src="../clismas/distjs/pages/dashboard.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="../clismas/dist/js/demo.js"></script>
            <!-- datepicker -->
            <script src="../clismas/plugins/datepicker/dist/js/bootstrap-datepicker.min.js"></script>
            <!-- page script -->
            <!-- jvectormap -->
            <script src="../clismas/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="../clismas/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <!-- Sparkline -->
            <script src="../clismas/plugins/sparkline/jquery.sparkline.min.js"></script>

            <!-- jQuery Knob Chart -->
            <script src="../clismas/plugins/knob/dist/jquery.knob.min.js"></script>
            <script src="../clismas/plugins/daterangepicker/daterangepicker.js"></script>
            <script src="../clismas/plugins/morris/morris.min.js"></script>
            <script>
            $(function () {
                $("#example1").DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });

                $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
                });
                $("#example3").DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });
            </script>        


            <!-- Morris.js charts -->
            <script src="bower_components/raphael/raphael.min.js"></script>
            <!-- daterangepicker -->
            <script src="bower_components/moment/min/moment.min.js"></script>
            
            <!-- AdminLTE App -->
            <script src="dist/js/adminlte.min.js"></script>
            







    </body>
</html>
