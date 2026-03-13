@extends('layouts/basic')

@section('content')

    @if ($snipeSettings->custom_forgot_pass_url)

        <div class="box login-box">
            <div class="box-header with-border">
                <h1 class="box-title">{{ trans('auth/general.send_password_link') }}</h1>
            </div>

            <div class="login-box-body">
                <div class="alert alert-info text-center">
                    <a href="{{ $snipeSettings->custom_forgot_pass_url }}" rel="noopener">
                        {{ trans('auth/general.ldap_reset_password') }}
                    </a>
                </div>
            </div>
        </div>

    @else

        <form class="form" role="form" method="POST" action="{{ url('/password/email') }}">
            {!! csrf_field() !!}

            <div class="box login-box">
                <div class="box-header with-border">
                    <h1 class="box-title">{{ trans('auth/general.send_password_link') }}</h1>
                </div>

                <div class="login-box-body">
                    <div class="alert alert-info">
                        <x-icon type="info-circle" />
                        {!! trans('auth/general.username_help_top') !!}
                    </div>

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
                            value="{{ old('username') }}"
                            placeholder="{{ trans('admin/users/table.username') }}"
                            aria-label="username"
                        >

                        {!! $errors->first('username', '<span class="alert-msg"><i class="fas fa-times"></i> :message</span>') !!}
                    </div>

                    <div class="form-group" style="margin-top: 14px;">
                        <a href="#" id="show" class="forgot-link">
                            <x-icon type="caret-right" />
                            {{ trans('general.show_help') }}
                        </a>

                        <a href="#" id="hide" class="forgot-link" style="display:none;">
                            <x-icon type="caret-up" />
                            {{ trans('general.hide_help') }}
                        </a>

                        <p class="help-block" id="help-text" style="display:none; margin-top:10px;">
                            {!! trans('auth/general.username_help_bottom') !!}
                        </p>
                    </div>
                </div>

                <div class="box-footer login-box-footer">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ trans('auth/general.email_reset_password') }}
                    </button>
                </div>
            </div>
        </form>

    @endif

@stop

@push('js')
<script nonce="{{ csrf_token() }}">
    $(document).ready(function () {
        $("#show").click(function(e){
            e.preventDefault();
            $("#help-text").fadeIn(500);
            $("#show").hide();
            $("#hide").show();
        });

        $("#hide").click(function(e){
            e.preventDefault();
            $("#help-text").fadeOut(300);
            $("#show").show();
            $("#hide").hide();
        });
    });
</script>
@endpush