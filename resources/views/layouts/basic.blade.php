<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ Helper::determineLanguageDirection() }}" data-theme="light">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ($snipeSettings) && ($snipeSettings->site_name) ? $snipeSettings->site_name : 'Snipe-IT' }}</title>

    <link rel="shortcut icon" type="image/ico" href="{{ ($snipeSettings) && ($snipeSettings->favicon!='') ?  Storage::disk('public')->url(e($snipeSettings->favicon)) : config('app.url').'/favicon.ico' }}">
    {{-- stylesheets --}}
    <link rel="stylesheet" href="{{ url(mix('css/dist/all.css')) }}">

<script nonce="{{ csrf_token() }}">
        window.snipeit = {
            settings: {
                "per_page": 50
            }
        };
    </script>

    @if (($snipeSettings) && ($snipeSettings->custom_css))
        <style>
            {!! $snipeSettings->show_custom_css() !!}
        </style>
    @endif

    <style>
        body.login-page {
            margin: 0;
            min-height: 100vh;
            background: #ffffff;
            font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .hospital-login-layout {
            min-height: 100vh;
            display: flex;
            flex-wrap: wrap;
        }

        .hospital-login-branding {
            width: 50%;
            min-height: 100vh;
            background: #005ea8;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }

        .hospital-login-branding:before {
            content: "";
            position: absolute;
            top: -80px;
            right: -80px;
            width: 260px;
            height: 260px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
        }

        .hospital-login-branding:after {
            content: "";
            position: absolute;
            bottom: -120px;
            left: -100px;
            width: 320px;
            height: 320px;
            background: rgba(242, 148, 0, 0.18);
            border-radius: 50%;
        }

        .branding-content {
            position: relative;
            z-index: 2;
            max-width: 460px;
        }

        .branding-logo {
            margin-bottom: 24px;
        }

        .branding-logo img {
            max-width: 190px;
            height: auto;
            background: #ffffff;
            padding: 10px 14px;
            border-radius: 12px;
        }

        .branding-title {
            font-size: 36px;
            line-height: 1.2;
            font-weight: 700;
            margin: 0 0 14px 0;
            color: #ffffff;
            background: none !important;
            display: block;
        }

        .branding-subtitle {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
            color: rgba(255,255,255,0.95);
        }

        .branding-divider {
            width: 70px;
            height: 4px;
            background: #f29400;
            border-radius: 10px;
            margin: 22px 0;
        }

        .branding-description {
            font-size: 15px;
            line-height: 1.8;
            color: rgba(255,255,255,0.90);
            max-width: 420px;
        }

        .hospital-login-form-area {
            width: 50%;
            min-height: 100vh;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 24px;
        }

        .hospital-login-panel {
            width: 100%;
            max-width: 480px;
        }

        .mobile-brand {
            display: none;
            text-align: center;
            margin-bottom: 24px;
        }

        .mobile-brand img {
            max-width: 150px;
            height: auto;
            margin-bottom: 10px;
        }

        .mobile-brand h1 {
            margin: 0;
            color: #005ea8;
            font-size: 26px;
            font-weight: 700;
        }

        .mobile-brand p {
            margin: 6px 0 0 0;
            color: #5f6b7a;
            font-size: 14px;
        }

        .login-box {
            border-radius: 16px;
            border: 1px solid #e7edf3;
            box-shadow: 0 16px 40px rgba(0, 94, 168, 0.10);
            overflow: hidden;
            background: #ffffff;
        }

        .login-box .box-header {
            padding: 24px 26px 16px 26px;
            background: #ffffff;
            border-bottom: 3px solid #f29400;
        }

        .login-box .box-title {
            color: #005ea8;
            font-size: 26px;
            font-weight: 700;
            margin: 0;
            line-height: 1.3;
        }

        .login-box-body {
            padding: 32px;
        }

        .login-box-footer {
            padding: 20px 26px 24px 26px;
            background: #ffffff;
            border-top: 1px solid #edf2f7;
        }

        .form-group label {
            color: #005ea8;
            font-weight: 600;
            margin-bottom: 8px;
            display: inline-block;
        }

        .form-control {
            border: 1px solid #cfd8e3;
            border-radius: 8px;
            height: 44px;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #005ea8;
            box-shadow: 0 0 0 3px rgba(0, 94, 168, 0.12);
        }

        .btn-primary {
            background-color: #005ea8;
            border-color: #005ea8;
            color: #ffffff;
            border-radius: 6px;
            font-weight: 700;
            height: 44px;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: #004b86 !important;
            border-color: #004b86 !important;
            color: #ffffff !important;
        }

        .btn-google {
            border-radius: 6px;
        }

        .separator {
            text-align: center;
            color: #7a8794;
            font-size: 12px;
            margin: 14px 0;
            position: relative;
        }

        .separator:before,
        .separator:after {
            content: "";
            display: inline-block;
            width: 35%;
            height: 1px;
            background: #d9e2ec;
            vertical-align: middle;
            margin: 0 8px;
        }

        .alert-info {
            background: #eef6fc;
            border: 1px solid #cfe4f5;
            color: #0d4f82;
            border-radius: 8px;
        }

        .remember-box {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f8fbfe;
            border: 1px solid #e2ebf3;
            border-radius: 8px;
            padding: 10px 12px;
            color: #405261;
            font-weight: 400 !important;
        }

        .forgot-link,
        .privacy-link,
        .saml-link {
            color: #005ea8;
            font-weight: 600;
            text-decoration: none;
        }

        .forgot-link:hover,
        .privacy-link:hover,
        .saml-link:hover {
            color: #f29400;
            text-decoration: none;
        }

        .login-footer {
            text-align: center;
            margin-top: 22px;
            font-size: 13px;
            color: #6c7a89;
        }

        @media (max-width: 992px) {
            .hospital-login-branding {
                display: none;
            }

            .hospital-login-form-area {
                 width: 50%;
                 min-height: 100vh;
                background: #f6f9fc;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 40px 24px;
            }

            .mobile-brand {
                display: block;
            }
        }
    </style>
</head>

<body class="hold-transition login-page">

  <div class="hospital-login-layout">

        <div class="hospital-login-branding">
            <div class="branding-content">
                {{-- <div class="branding-logo">
                    @if (($snipeSettings) && ($snipeSettings->logo!=''))
                       <img id="login-logo" src="{{ asset('img/logo.png') }}" alt="Logo de l'Hôpital">
                    @endif
                </div> --}}

                <h1 class="branding-title">CHU UCL Namur</h1>
                    <p class="branding-subtitle">
                      Plateforme de gestion du patrimoine et des équipements hospitaliers
                    </p>

                <div class="branding-divider"></div>

                <div class="branding-description">
                    Gérez les équipements biomédicaux, le matériel informatique, le mobilier
                    et les ressources internes dans une interface centralisée, sécurisée et
                    adaptée à l’environnement hospitalier.
                </div>
                   <p style="margin-top:30px; opacity:0.8; font-size:13px;">
                    Système interne réservé au personnel autorisé.
                  </p>
            </div>
        </div>

        <div class="hospital-login-form-area">
            <div class="hospital-login-panel">

                <div class="mobile-brand">
                    @if (($snipeSettings) && ($snipeSettings->logo!=''))
                        <img src="{{ Storage::disk('public')->url('').e($snipeSettings->logo) }}" alt="{{ $snipeSettings->site_name }}">
                    @endif
                    <h1>CHU UCL Namur</h1>
                    <p>Gestion des actifs hospitaliers</p>
                </div>

                @yield('content')

                <div class="login-footer">
                    @if (($snipeSettings) && ($snipeSettings->privacy_policy_link!=''))
                        <a class="privacy-link" target="_blank" rel="noopener" href="{{ $snipeSettings->privacy_policy_link }}">
                            {{ trans('admin/settings/general.privacy_policy') }}
                        </a>
                    @endif
                </div>

            </div>
        </div>

    </div>

    <script src="{{ url(mix('js/dist/all.js')) }}" nonce="{{ csrf_token() }}"></script>
    @stack('js')
</body>
</html>