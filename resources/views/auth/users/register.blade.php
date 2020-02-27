<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Hesap oluştur</title>
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

<body class="signup-page">
<div class="signup-box">
    <div class="logo">
        <a href="javascript:void(0);">Zone<b>Zero</b></a>
        <small>Hesap oluştur!</small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_up" method="POST" action="{{ route('user.register') }}">
                {{ csrf_field() }}
                <div class="msg">Yeni hesap oluşturma formu</div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">face</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="tckn" placeholder="TC Kimlik No" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="first_name" placeholder="İsim" required>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="last_name" placeholder="Soyisim" required>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">date_range</i>
                        </span>
                    <div class="form-line">
                        <input type="number" min="1900" max="2020" class="form-control" name="birth_year" placeholder="Doğum Yılı" required>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="phone_number" placeholder="Telefon Numarası" required>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" minlength="6" placeholder="Şifre" required>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password_confirmation" minlength="6" placeholder="Şifreyi doğrula" required>
                    </div>
                </div>

                <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">ÜYE OL</button>

                <div class="m-t-25 m-b--5 align-center">
                    @include('layouts.partials.error')
                </div>
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