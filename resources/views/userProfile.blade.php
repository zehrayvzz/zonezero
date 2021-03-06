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
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="top-right links">
        <form id="logoutForm" action="{{ route('user.logout') }}" method="post" style="display: none">
            {{ csrf_field() }}
        </form>
        <a href="#" onclick="event.preventDefault();document.getElementById('logoutForm').submit();">Çıkış yap</a>
    </div>

    <div class="content">
        <div class="title m-b-md">
            ZoneZero
        </div>

        <div >
            <table class="table table-bordered">
                <thead>
                <th>TC Kimlik Numarası</th>
                <th>İsim</th>
                <th>Soyisim</th>
                <th>Doğum Yılı</th>
                <th>Telefon Numarası</th>
                <th>İşlem</th>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $user->tckn }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->birth_year }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td><a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">Düzenle</a></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
</body>
</html>