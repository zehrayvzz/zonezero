<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .center_div{
            margin: 0 auto;
            width:80% /* value of your choice which suits your alignment */
        }

    </style>
</head>
<body>



    <div class="top-right links">
        <form id="logoutForm" action="{{ route('user.logout') }}" method="post" style="display: none">
            {{ csrf_field() }}
        </form>
        <a href="#" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">Çıkış yap</a>
    </div>

    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <!-- Form -->
                <form class="form-example" action="{{ route('user.edit',$user->id) }}" method="post">
                    {{ csrf_field() }}
                    <h1>Bilgileri Güncelle</h1>

                    <div class="form-group">
                        <label for="tckn">TC Kimlik Numarası:</label>
                        <input type="text"  name="tckn" value="{{ $user->tckn }}" class="form-control tckn" id="tckn" placeholder="TC Kimlik Numarası" required>
                    </div>
                    <div class="form-group">
                        <label for="first_name">İsim:</label>
                        <input type="text"  name="first_name" value="{{ $user->first_name }}" class="form-control first_name" id="first_name" placeholder="İsim" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Soyisim:</label>
                        <input type="text"  name="last_name" value="{{ $user->last_name }}" class="form-control last_name" id="last_name" placeholder="Soyisim" required>
                    </div>
                    <div class="form-group">
                        <label for="birth_year">Doğum Yılı:</label>
                        <input type="number"  name="birth_year" value="{{ $user->birth_year }}" min="1900" max="2020" class="form-control birth_year" id="birth_year" placeholder="Doğum Yılı" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Telefon Numarası:</label>
                        <input type="text"  name="phone_number" value="{{ $user->phone_number }}" class="form-control phone_number" id="phone_number" placeholder="Telefon Numarası" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Şifre:</label>
                        <input type="password" class="form-control password" id="password" placeholder="Şifre" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_conf">Şifre Tekrar:</label>
                        <<input name="password_confirmation" type="password" id="password_conf" class="form-control" placeholder="Şifre tekrar" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-customized">Güncelle</button>

                    @include('layouts.partials.error')
                </form>
                <!-- Form end -->
            </div>
        </div>
    </div>

</body>
</html>