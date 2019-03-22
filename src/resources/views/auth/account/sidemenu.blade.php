<div class="box">
	<div class="box-body box-profile">
		<img class="profile-user-img img-responsive img-circle" src="{{ AdminLTE::avatar_url(Auth::user()) }}">
		<h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
	</div>

	<hr class="m-t-0 m-b-0">

	<ul class="nav nav-pills nav-stacked">

		<li role="presentation"
			@if (Request::route()->getName() == 'LaravelAdminLTE.account.info')
				class="active"
			@endif
				><a href="{{ route('LaravelAdminLTE.account.info') }}">{{ trans('gpibarra::laraveladminlte.update_account_info') }}</a>
		</li>

		<li role="presentation"
			@if (Request::route()->getName() == 'LaravelAdminLTE.account.password')
				class="active"
			@endif
				><a href="{{ route('LaravelAdminLTE.account.password') }}">{{ trans('gpibarra::laraveladminlte.change_password') }}</a>
		</li>

	</ul>
</div>
