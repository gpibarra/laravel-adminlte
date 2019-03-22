<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>
      {{ isset($title) ? $title.' :: '.config('laraveladminlte.project_name') : config('laraveladminlte.project_name') }}
    </title>

    @yield('before_styles')
    @stack('before_styles_stack')


    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('vendor/gpibarra/') }}/plugins/select2/css/select2.min.css"

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/dist/css/skins/_all-skins.min.css">

    <!-- LaravelAdminLTE CSS -->
    @if (file_exists(public_path('vendor/gpibarra/css/LaravelAdminLTE.css')))
    <link rel="stylesheet" href="{{ asset('vendor/gpibarra/') }}/css/LaravelAdminLTE.css">
    @endif
    @if (file_exists(public_path('vendor/gpibarra/css/LaravelAdminLTE_'.config('laraveladminlte.skin').'.css')))
    <link rel="stylesheet" href="{{ asset('vendor/gpibarra/') }}/css/LaravelAdminLTE_{{ config('laraveladminlte.skin') }}.css">
    @endif
    <!-- PNotify CSS -->
    @if (file_exists(public_path('vendor/gpibarra/plugins/pnotify/pnotify.custom.min.css')))
    <link rel="stylesheet" href="{{ asset('vendor/gpibarra/') }}/plugins/pnotify/pnotify.custom.min.css">
    @endif
    <!-- Loading Styles -->
    <link href="{{ asset('vendor/gpibarra/') }}/css/loading.css" rel="stylesheet">

{{--
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
--}}
{{--
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
--}}
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    @yield('after_styles')
    @stack('after_styles_stack')

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition {{ AdminLTE::isCollapseSideBar()?'sidebar-collapse':'' }} {{ config('laraveladminlte.skin') }} sidebar-mini">
	<script type="text/javascript">
		/* Recover sidebar state */
		(function () {
			if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
				var body = document.getElementsByTagName('body')[0];
				body.className = body.className + ' sidebar-collapse';
			}
		})();
	</script>
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{ url('') }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">{!! config('laraveladminlte.logo_mini') !!}</span>
          {{--
          <span class="logo-mini">
            <img src=" {{asset('img/logo_min.png') }}" alt="Logo" height="43"/>
          </span>
          --}}
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">{!! config('laraveladminlte.logo_lg') !!}</span>
          {{--
          <span class="logo-lg">
            <img src="{{ asset('img/logo.png')}} " alt="Logo" height="43"/>
          </span>
          --}}
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">{{ trans('gpibarra::laraveladminlte.toggle_navigation') }}</span>
          </a>

          @include('LaravelAdminLTE::inc.menu')
        </nav>
      </header>

      <!-- =============================================== -->

      @if (!AdminLTE::isDisabledSideBar())
      @include('LaravelAdminLTE::inc.sidebar')
      @endif

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
         @yield('header')

        <!-- Main content -->
        <section class="content" id="app">

          @yield('content')

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs hidden-sm">
          <span>Copyright © {{ \Carbon\Carbon::now()->year }}.</span>
          <span>{{ trans('gpibarra::laraveladminlte.handcrafted_by') }} <a target="_blank" href="{{ config('laraveladminlte.developer_link') }}">{!! config('laraveladminlte.developer_name') !!}</a>.</span>
        </div>
        <div class="container text-center hidden-md hidden-lg">
          <span>Copyright © {{ \Carbon\Carbon::now()->year }}.</span>
          <span>{{ trans('gpibarra::laraveladminlte.handcrafted_by') }} <a target="_blank" href="{{ config('laraveladminlte.developer_link') }}">{!! config('laraveladminlte.developer_name') !!}</a>.</span>
        </div>
      </footer>
    </div>
    <!-- ./wrapper -->

    @include('LaravelAdminLTE::inc.loading')

    @yield('before_scripts')
    @stack('before_scripts_stack')

    <!-- jQuery 3 -->
    <script src="{{ asset('vendor/adminlte/') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('vendor/adminlte/') }}/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('vendor/adminlte/') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
{{--
    <!-- Morris.js charts -->
    <script src="{{ asset('vendor/adminlte/') }}/bower_components/raphael/raphael.min.js"></script>
    <script src="{{ asset('vendor/adminlte/') }}/bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ asset('vendor/adminlte/') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="{{ asset('vendor/adminlte/') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ asset('vendor/adminlte/') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('vendor/adminlte/') }}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('vendor/adminlte/') }}/bower_components/moment/min/moment.min.js"></script>
    <script src="{{ asset('vendor/adminlte/') }}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="{{ asset('vendor/adminlte/') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('vendor/adminlte/') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('vendor/adminlte/') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendor/adminlte/') }}/bower_components/fastclick/lib/fastclick.js"></script>
--}}
    <!-- Select2 -->
    <script src="{{ asset('vendor/gpibarra/') }}/plugins/select2/js/select2.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('vendor/adminlte/') }}/dist/js/adminlte.min.js"></script>
    @if (file_exists(public_path('vendor/gpibarra/js/adminlte.js')))
    <script src="{{ asset('vendor/gpibarra/') }}/js/adminlte.js"></script>
    @endif
{{--
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('vendor/adminlte/') }}/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('vendor/adminlte/') }}/dist/js/demo.js"></script>
--}}
    <!-- page script -->
    <script type="text/javascript">
        /* Store sidebar state */
        $('.sidebar-toggle').click(function(event) {
          event.preventDefault();
          if (Boolean(sessionStorage.getItem('sidebar-toggle-collapsed'))) {
            sessionStorage.setItem('sidebar-toggle-collapsed', '');
          } else {
            sessionStorage.setItem('sidebar-toggle-collapsed', '1');
          }
        });
//        // To make Pace works on Ajax calls
//        $(document).ajaxStart(function() { Pace.restart(); });
//
//        // Ajax calls should always have the CSRF token attached to them, otherwise they won't work
//        $.ajaxSetup({
//                headers: {
//                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                }
//            });
//
       // Set active state on menu element
       var current_url = "{{ Request::url() }}";
       var full_url = current_url+location.search;
       var $navLinks = $("ul.sidebar-menu li a");
       // First look for an exact match including the search string
       var $curentPageLink = $navLinks.filter(
           function() { return $(this).attr('href') === full_url; }
       );
       var $curentPageLink = $navLinks.filter(
           function() { return $(this).attr('href') === current_url; }
       );
       // If not found, look for the link that starts with the url
       if(!$curentPageLink.length > 0){
           $curentPageLink = $navLinks.filter(
               function() { return $(this).attr('href').startsWith(current_url); }
           );
       }
       if(!$curentPageLink.length > 0){
           $curentPageLink = $navLinks.filter(
               function() { return current_url.startsWith($(this).attr('href')); }
           );
       }

       $curentPageLink.parents('li').addClass('active');
       {{-- Enable deep link to tab --}}
       var activeTab = $('[href="' + location.hash.replace("#", "#tab_") + '"]');
       location.hash && activeTab && activeTab.tab('show');
       $('.nav-tabs a').on('shown.bs.tab', function (e) {
           location.hash = e.target.hash.replace("#tab_", "#");
       });
    </script>


    @include('LaravelAdminLTE::inc.alertsJS')

    <!-- JavaScripts -->
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}

    <script>
      $(document).ready(function(){
        //Select2
        $('.select-select2').select2({
          allowClear: true,
          width: '100%',
          placeholder: {
            id: "",
            placeholder: ""
          },
        });
      });
    </script>
    @yield('after_scripts')
    @stack('after_scripts_stack')
</body>
</html>
