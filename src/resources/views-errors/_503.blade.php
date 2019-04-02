@extends('errors.error')

@section('title', __('errors.Service Unavailable'))
@section('code', '503')
@section('message', __('errors.'.($exception->getMessage() ?: 'Service Unavailable')))
