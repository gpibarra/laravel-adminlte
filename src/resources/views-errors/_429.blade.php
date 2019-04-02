@extends('errors.error')

@section('title', __('errors.Too Many Requests'))
@section('code', '429')
@section('message', __('errors.Too Many Requests'))
