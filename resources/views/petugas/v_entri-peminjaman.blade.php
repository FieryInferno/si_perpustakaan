@extends('layouts.v_template')
@section('title', 'Entri Peminjaman')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Peminjaman</h1>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="col-md-12">
                    <form action="{{url('entri-peminjaman')}}" id="formtambah" method="GET">
                        @csrf
                        <div class=" form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Kode Anggota</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kd_anggota" value="{{ old('kd_anggota') }}" autofocus>
                                <div class="text-danger">
                                    @error('kd_anggota')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 text-md-right">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@include('sweetalert::alert')
@endsection
