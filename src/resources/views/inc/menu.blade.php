<div class="navbar-custom-menu pull-left">
    <ul class="nav navbar-nav">
        <!-- =================================================== -->
        <!-- ========== Top menu items (ordered left) ========== -->
        <!-- =================================================== -->
        @if (AdminLTE::isError())
        @else
        <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->
        @endif
        <!-- ========== End of top menu left items ========== -->
    </ul>
</div>

<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <!-- ========================================================= -->
        <!-- ========== Top menu right items (ordered left) ========== -->
        <!-- ========================================================= -->
        @if (AdminLTE::isError())
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li><a href="{{ url()->previous() }}"><span class="glyphicon glyphicon-arrow-left"></span> Volver</a></li>
            </ul>
        </div>
        @else
        <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->
        @if (Auth::guest())
            @if (!AdminLTE::isLogin())
            <li><a href="{{ route('login') }}">{{ trans('gpibarra::laraveladminlte.login') }}</a></li>
            @endif
            @if (config('laraveladminlte.registration_open'))
            <li><a href="{{ route('register') }}">{{ trans('gpibarra::laraveladminlte.register') }}</a></li>
            @endif
        @elseif(Auth::check())
            {{--
              <li><a href="{{ route('logout') }}"><i class="fa fa-btn fa-sign-out"></i> {{ trans('gpibarra::laraveladminlte.logout') }}</a></li>
            --}}
          {{--
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out"></i> {{ trans('gpibarra::laraveladminlte.logout') }}</a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
          --}}

          @include('LaravelAdminLTE::inc.notifications')

          <!-- User Account: style can be found in dropdown.less -->
          <li class="nav-item dropdown user user-menu">
            <a href="#" class="dropdown-toggle nav-link" role="button" data-toggle="dropdown">
                <img src="{{ AdminLTE::avatar_url(Auth::user()) }}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                {{--
                <!-- User image -->
                <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                    Alexander Pierce - Web Developer
                    <small>Member since Nov. 2012</small>
                </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                <div class="row">
                    <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                    </div>
                </div>
                <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                </li>
                --}}
                <li class="user-body">
                <a href="{{ route('LaravelAdminLTE.account.info') }}"><span><i class="fa fa-user-circle-o"></i> {{ trans('gpibarra::laraveladminlte.my_account') }} ({{ Auth::user()->username}})</span></a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-user-panel').submit();"><span><i class="fa fa-sign-out"></i>{{ trans('gpibarra::laraveladminlte.logout') }}</span></a>
                    <form id="logout-form-user-panel" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
          </li>
        @endif
        @endif
        <!-- ========== End of top menu right items ========== -->
    </ul>
</div>
