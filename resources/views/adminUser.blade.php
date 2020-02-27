@extends('layouts.app')

@section('title','Yönetim Sayfası')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Kullanıcılar
                    </h2>
                    <span class="header-dropdown">
                                <a href="{{ route('admin.user.create') }}" class="btn btn-warning pull-right">
                                    Kullanıcı Ekle
                                </a>
                    </span>
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>TC Kimlik Numarası</th>
                            <th>Ad</th>
                            <th>Soyad</th>
                            <th>Doğum Yılı</th>
                            <th>Telefon Numarası</th>
                            <th class="text-center">İşlem</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->tckn }}</td>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->birth_year }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.loginAsUser',$user->id) }}" target="_blank" class="btn-success btn ">Login as User</a>
                                <a href="{{ route('admin.user.edit',$user->id) }}" class="btn-primary btn ">Düzenle</a>
                                <a href="{{ route('admin.user.destroy',$user->id) }}"  class="btn-danger btn ">Sil</a>
                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection