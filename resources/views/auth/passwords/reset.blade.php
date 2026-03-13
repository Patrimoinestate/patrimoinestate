@extends('layouts/basic')

@section('content')

<form class="form" role="form" method="POST" action="{{ url('/password/reset') }}">
    {!! csrf_field() !!}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="box login-box">
        <div class="box-header with-border">
            <h1 class="box-title">{{ trans('auth/general.reset_password') }}</h1>
        </div>

        <div class="login-box-body">
            @include('notifications')

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username">
                    <x-icon type="user" />
                    {{ trans('admin/users/table.username') }}
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="username"
                    id="username"
                    value="{{ old('username', $username) }}"
                >

                {!! $errors->first('username', '<span class="alert-msg"><i class="fas fa-times"></i> :message</span>') !!}
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">
                    <x-icon type="password" />
                    {{ trans('admin/users/table.password') }}
                </label>

                <input
                    type="password"
                    class="form-control"
                    name="password"
                    id="password"
                    aria-label="password"
                >

                {!! $errors->first('password', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password_confirmation">
                    <x-icon type="password" />
                    {{ trans('admin/users/table.password_confirm') }}
                </label>

                <input
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                    id="password_confirmation"
                    aria-label="password_confirmation"
                >

                {!! $errors->first('password_confirmation', '<span class="alert-msg" aria-hidden="true"><i class="fas fa-times" aria-hidden="true"></i> :message</span>') !!}
            </div>
        </div>

        <div class="box-footer login-box-footer">
            <button type="submit" class="btn btn-primary btn-block">
                {{ trans('auth/general.reset_password') }}
            </button>
        </div>
    </div>
</form>

@stop