<div class="user-panel">
	<a class="pull-left image" href="{{ route('LaravelAdminLTE.account.info') }}">
		<img src="{{ AdminLTE::avatar_url(Auth::user()) }}" class="img-circle" alt="User Image">
	</a>
	<div class="pull-left info">
		<p><a href="{{ route('LaravelAdminLTE.account.info') }}">{{ Auth::user()->name }}</a></p>
		<small><small>
		<a href="{{ route('LaravelAdminLTE.account.info') }}"><span><i class="fa fa-user-circle-o"></i> {{ trans('gpibarra::laraveladminlte.my_account') }}</span></a>
		&nbsp; &nbsp; 
		<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-user-panel').submit();"><i class="fa fa-sign-out"></i> <span>{{ trans('gpibarra::laraveladminlte.logout') }}</span></a>
		<form id="logout-form-user-panel" action="{{ route('logout') }}" method="POST" style="display: none;">
			@csrf
		</form>
		</small></small>
	</div>
</div>