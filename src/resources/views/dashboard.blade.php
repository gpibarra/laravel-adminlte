@extends('LaravelAdminLTE::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('gpibarra::laraveladminlte.dashboard') }}<small>{{ trans('gpibarra::laraveladminlte.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ AdminLTE::url() }}">{{ config('laraveladminlte.project_name') }}</a></li>
        <li class="active">{{ trans('gpibarra::laraveladminlte.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">{{ trans('gpibarra::laraveladminlte.login_status') }}</div>
                </div>

                @if (Auth::guest())
                    <div class="box-body">{{ trans('gpibarra::laraveladminlte.not_logged_in') }}</div>
                @else
                    <div class="box-body">{{ trans('gpibarra::laraveladminlte.logged_in') }}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
