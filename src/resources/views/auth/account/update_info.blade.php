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
            {{ trans('gpibarra::laraveladminlte.update_account_info') }}
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

        <form class="form" action="{{ route('LaravelAdminLTE.account.info') }}" method="post">

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
                            $label = trans('gpibarra::laraveladminlte.name');
                            $field = 'name';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input required class="form-control" type="text" name="{{ $field }}" value="{{ old($field) ? old($field) : $user[$field] }}">
                    </div>

                    <div class="form-group">
                        @php
                            $label = trans('gpibarra::laraveladminlte.email_address');
                            $field = 'email';
                        @endphp
                        <label class="required">{{ $label }}</label>
                        <input required class="form-control" type="email" name="{{ $field }}" value="{{ old($field) ? old($field) : $user[$field] }}">
                    </div>

                </div>

                <div class="box-footer">

                    <button type="submit" class="btn btn-success"><span class="ladda-label"><i class="fa fa-save"></i> {{ trans('gpibarra::laraveladminlte.save') }}</span></button>
                    <a href="{{ AdminLTE::url() }}" class="btn btn-default"><span class="ladda-label">{{ trans('gpibarra::laraveladminlte.cancel') }}</span></a>

                </div>
            </div>

        </form>

    </div>
</div>
@endsection
