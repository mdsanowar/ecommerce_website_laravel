<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{asset('pubilc/backend/images/favicon_1.ico')}}">
        {{-- <title>Moltran - Responsive Admin Dashboard Template</title> --}}

        <!-- Base Css Files -->
        <link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Font Icons -->
        {{-- <link href="{{asset('public/backend/assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" /> --}}
        <link href="{{asset('public/backend/css/all.css')}}" rel="stylesheet" />
        <link href="{{asset('public/backend/assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('public/backend/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{asset('public/backend/css/animate.css')}}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{asset('public/backend/css/waves-effect.css')}}" rel="stylesheet">

        <link href="{{asset('public/backend/assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
        {{--  --}}

        <!-- Custom Files -->
        <link href="{{asset('public/backend/css/helper.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/backend/css/style.css')}}" rel="stylesheet" type="text/css" />

        <script src="{{asset('public/backend/js/modernizr.min.js')}}"></script>
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

        @stack('css')
        
    </head>



    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            @include('layouts.backend.partial.topbar')
            <!-- #Top Bar -->
    
            <!-- Left Sidebar -->
            @include('layouts.backend.partial.sidebar')
            <!-- Left Sidebar End --> 



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">                     
            @yield('content')

            <footer class="footer text-right">
                2019 © Learn It.
            </footer>
            </div>

        </div>
        <!-- END wrapper -->
         
    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('public/backend/js/jquery.min.js')}}"></script>
        <script src="{{asset('public/backend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/backend/js/waves.js')}}"></script>
        <script src="{{asset('public/backend/js/wow.min.js')}}"></script>
        <script src="{{asset('public/backend/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/backend/js/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/chat/moment-2.2.1.js')}}"></script>
        <script src="{{asset('public/backend/assets/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/jquery-detectmobile/detect.js')}}"></script>
        <script src="{{asset('public/backend/assets/fastclick/fastclick.js')}}"></script>
        <script src="{{asset('public/backend/assets/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('public/backend/assets/jquery-blockui/jquery.blockUI.js')}}"></script>

    

        <!-- flot Chart -->
        {{-- <script src="assets/flot-chart/jquery.flot.js"></script>
        <script src="assets/flot-chart/jquery.flot.time.js"></script>
        <script src="assets/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="assets/flot-chart/jquery.flot.resize.js"></script>
        <script src="assets/flot-chart/jquery.flot.pie.js"></script>
        <script src="assets/flot-chart/jquery.flot.selection.js"></script>
        <script src="assets/flot-chart/jquery.flot.stack.js"></script>
        <script src="assets/flot-chart/jquery.flot.crosshair.js"></script> --}}

        <!-- Counter-up -->
        <script src="{{asset('public/backend/assets/counterup/waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/backend/assets/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="{{asset('public/backend/js/jquery.app.js')}}"></script>

        <!-- Dashboard -->
        <script src="{{asset('public/backend/js/jquery.dashboard.js')}}"></script>

        <!-- Chat -->
        <script src="{{asset('public/backend/js/jquery.chat.js')}}"></script>

        <!-- Todo -->
        <script src="{{asset('public/backend/js/jquery.todo.js')}}"></script>
        <script src="{{asset('public/backend/assets/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/datatables/dataTables.bootstrap.js')}}"></script>
        <script src="{{asset('https://cdn.jsdelivr.net/npm/sweetalert2@8')}}"></script>
        <script src="{{asset('http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js')}}"></script>
        {!! Toastr::message() !!}
 

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>   

        @stack('js')    

    </body>
</html>