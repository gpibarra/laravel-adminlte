@extends('errors.error')

@section('title', __('errors.Error'))
@section('code', $exception->getStatusCode())
{{-- @section('message', __('errors.'.($exception->getMessage() ?: 'Error undefined'))) --}}
@section('message', __('errors.Whoops, looks like something went wrong.'))