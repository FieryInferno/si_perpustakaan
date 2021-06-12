@extends('layouts.v_template')
@section('title', 'Profil Saya')
@section('content')
<section class="content-header">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profil Saya</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile Saya</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Modal Ubah -->
            <div class="modal fade" id="modal-ubah">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Ubah Profil</h4>
                            <button type="button" class=" close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden=" true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" id="formubah">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hakAkses" class="col-md-4 col-form-label text-md-right">Hak Akses</label>
                                    <div class="col-md-6">
                                        <select class="custom-select @error('is_admin') is-invalid @enderror" id="is_admin">
                                            <option selected>Pilih</option>
                                            <option value="1">Admin</option>
                                            <option value="0">Petugas</option>
                                        </select>
                                        @error('hasAkses')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <!-- Profile -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="row no-gutters">
                        <div class="col-sm-2 text-center">
                            <div>
                                <img class="profile-user-img rounded  img-circle" src="{{ asset('img')}}/profile-default.png" alt="User profile picture">
                            </div>
                            <h5 class="profile-username text-center">{{ Auth::user()->name }}</h5>
                            <!-- <a href="" data-toggle="modal" data-target="#modal-ubah"><i class="fas fa-edit "></i> Ubah Profile</a> -->

                        </div>
                        <div class="col-sm-10">
                            <ul class="list-group list-group-flush">
                                <p hidden> {{ $data= Auth::user()->is_admin }}</p>
                                <li class="list-group-item profile-username"><span class="badge badge-<?= ($data == '1') ? 'danger' : 'warning' ?>">{{ ($data == '1') ? 'Admin' : 'Petugas'}}</li>
                                <li class="list-group-item">Email : {{ Auth::user()->email }}</li>
                                <li class="list-group-item">Tanggal bergabung : {{ Auth::user()->created_at }} <br>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Keterangan waktu update -->
                    <div post clearfix>
                        <div class="user-block float-right"><span class="description clearfix">Terakhir diubah {{ Auth::user()->updated_at }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
