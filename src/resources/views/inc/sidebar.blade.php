    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        @if (Auth::check())
          <!-- Sidebar user panel -->
          {{-- @include('LaravelAdminLTE::inc.sidebar_user_panel') --}}
        @endif
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          @if (Auth::guest())
            <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> <span>Iniciar sesión</span></a></li>
          @endif

          {{-- <li class="header">{{ trans('gpibarra::laraveladminlte.administration') }}</li> --}}
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          @if (Auth::check())
          <li><a href="{{ AdminLTE::url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('gpibarra::laraveladminlte.dashboard') }}</span></a></li>
          @endif

          <!-- ======================================= -->
          {{-- <li class="header">Other menus</li> --}}
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
