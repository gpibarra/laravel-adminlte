@extends('LaravelAdminLTE::layout')

@section('after_styles')
<style media="screen">
    .LaravelAdminLTE-profile-form .required::after {
        content: ' *';
        color: red;
    }
</style>
@endsection

@section('header')
<section class="content-header">

    <h1>
        {{ trans('gpibarra::laraveladminlte.my_account') }}
    </h1>

    <ol class="breadcrumb">

        <li>
            <a href="{{ AdminLTE::url() }}">{{ config('laraveladminlte.project_name') }}</a>
        </li>

        <li>
            <a href="{{ route('LaravelAdminLTE.account.info') }}">{{ trans('gpibarra::laraveladminlte.my_account') }}</a>
        </li>

        <li class="active">
            {{ trans('gpibarra::laraveladminlte.change_password') }}
        </li>

    </ol>

</section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('LaravelAdminLTE::auth.account.sidemenu')
    </div>
    <div class="col-md-6">

        <form class="form" action="{{ route('LaravelAdminLTE.account.password') }}" method="post">

            {!! csrf_field() !!}

            <div class="box">

                <div class="box-body LaravelAdminLTE-profile-form">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->count())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        @php
                            $label = trans('gpibarra::laraveladminlte.old_password');
                            $field = 'old_password';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="" placeholder="{{ $label }}">
                    </div>

                    <div class="form-group">
                        @php
                            $label = trans('gpibarra::laraveladminlte.new_password');
                            $field = 'new_password';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="" placeholder="{{ $label }}">
                    </div>

                    <div class="form-group">
                        @php
                            $label = trans('gpibarra::laraveladminlte.confirm_password');
                            $field = 'confirm_password';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input autocomplete="new-password" required class="form-control" type="password" name="{{ $field }}" id="{{ $field }}" value="" placeholder="{{ $label }}">
                    </div>

                </div>

                <div class="box-footer">

                    <button type="submit" class="btn btn-success"><span class="ladda-label"><i class="fa fa-save"></i> {{ trans('gpibarra::laraveladminlte.change_password') }}</span></button>
                    <a href="{{ AdminLTE::url() }}" class="btn btn-default"><span class="ladda-label">{{ trans('gpibarra::laraveladminlte.cancel') }}</span></a>

                </div>
            </div>

        </form>

    </div>
</div>
@endsection
