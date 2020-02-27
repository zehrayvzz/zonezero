<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Zone<b>Zero</b></a>
        <small>Kullanıcı Girişi</small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" method="POST" action="{{ route('user.login') }}">
                {{ csrf_field() }}
            <div class="msg">Kullanıcı Giriş Formu</div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="tckn" placeholder="TC Kimlik No" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <input class="form-check-input" style="display: none;" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <div class="col-xs-4"></div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">GİRİŞ YAP</button>
                    </div>
                </div>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
                        <a href="sign-up.html">Şimdi üye ol!</a>
                    </div>
                </div>

                @include('layouts.partials.error')

            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('plugins/node-waves/waves.js') }}"></script>

<!-- Validation Plugin Js -->
<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('js/pages/examples/sign-in.js') }}"></script>
</body>

</html>