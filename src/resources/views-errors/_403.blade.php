@extends('errors.error')

@section('title', __('errors.Forbidden'))
@section('code', '403')
@section('message', __('errors.'.($exception->getMessage() ?: 'Forbidden')))
