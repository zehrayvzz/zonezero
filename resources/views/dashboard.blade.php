
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
                            Yöneticiler
                        </h2>
                        <span class="header-dropdown">
                                <a href="{{ route('admin.create') }}" class="btn btn-warning pull-right">
                                    Yönetici Ekle
                                </a>
                        </span>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th class="text-center">İşlem</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.edit',$admin->id) }}" class="btn-primary btn ">Düzenle</a>
                                        <a href="{{ route('admin.destroy',$admin->id) }}"  class="btn-danger btn ">Sil</a>
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