@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Iniciar sesión</div>

                <div class="panel-body">
                    <form class="form-horizontal" id="formLogin" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Usuario</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label for="sucursal" class="col-md-4 control-label">Sucursal</label>

                            <div class="col-md-6">
                                <select class="form-control" id="sucursal" name="sucursal" size="1">
                                    @foreach (config('kaury.ambientes') as $k=>$a)
                                    <option {{ ( (Ambiente::get()=="" && $a['default']) || strtolower(Ambiente::getNombre())==strtolower($k) )?'selected':'' }} value="{{ $a['dominio'] }}">{{ $a['nombre'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

{{--
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>
--}}
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-default btn-default-color">
                                    Ingresar
                                </button>
{{--
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Olvidó su contraseña?
                                </a>
--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

