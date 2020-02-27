@extends('layouts.app')

@section('title','Yönetim Sayfası')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Kullanıcı Bilgilerini Güncelle
                    </h2>
                </div>
                <div class="body">
                    <form id="form_validation" method="POST" action="{{ route('admin.user.edit',$user->id) }}">
                        {{ csrf_field() }}
                        <div class="row ">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6 ">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="tckn" type="text" class="form-control" value="{{ $user->tckn }}" placeholder="TC Kimlik Numarası" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6 ">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="first_name" type="text" class="form-control" value="{{ $user->first_name }}" placeholder="İsim" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6 ">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="last_name" type="text" class="form-control" value="{{ $user->last_name }}" placeholder="Soyisim" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6 ">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="birth_year" type="number" min="1900" max="2020" class="form-control" value="{{ $user->birth_year }}" placeholder="Doğum Yılı" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6 ">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="phone_number" type="tel" class="form-control" value="{{ $user->phone_number }}" placeholder="Telefon Numarası" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="password" type="password" class="form-control" required>
                                        <label class="form-label">Şifre</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input name="password_confirmation" type="password" class="form-control" required>
                                        <label class="form-label">Şifre-Tekrar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-4">
                                <button class="btn btn-success btn-large" >Bilgileri Güncelle</button>
                            </div>
                        </div>
                    </form>

                    @include('layouts.partials.error')
                </div>
            </div>
        </div>
    </div>
@endsection