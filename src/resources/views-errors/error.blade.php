@extends('layouts.app')
@push('after_styles_stack')
{{--
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
--}}
        <style>
            .full-height {
/*                height: calc(100% - 100px);*/
                height: 75vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }
        </style>
@endpush
@section('content')
        <div class="flex-center position-ref full-height">
{{--
            <div class="code">
                @yield('code')
            </div>
--}}

            <div class="message" style="padding: 10px;">
                @yield('message')
            </div>
        </div>
@endsection
