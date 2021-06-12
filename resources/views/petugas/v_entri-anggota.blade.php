@extends('layouts.v_template')
@section('title', 'Entri Anggota')
@section('content')
<section class="content-header">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Entri Data Anggota</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Kembali</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- Start Entri Siswa -->
                <div class="card-body">
                    <div class="col-md-10">
                        <form action="{{url('/simpan-anggota')}}" id="formtambah" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">No.Anggota</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="kd_anggota" value="{{ old('kd_anggota') }}" autocomplete="kd_anggota" autofocus>
                                    <div class="text-danger">
                                        @error('kd_anggota')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Status</label>
                                <div class="col-md-6">
                                    <select class="custom-select" name="status" id="status">
                                        <option selected>Pilih</option>
                                        <option value="Guru">Guru</option>
                                        <option value="Siswa">Siswa</option>
                                    </select>
                                    <div class="text-danger">
                                        @error('status')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">No. Identitas</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="no_identitas" value="{{ old('no_identitas') }}" autocomplete="no_identitas">
                                    <div class="text-danger">
                                        @error('no_identitas')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Nama Anggota</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nama_anggota" id="nama_anggota" value="{{ old('nama_anggota') }}" autocomplete="nama_anggota">
                                    <div class="text-danger">
                                        @error('nama_anggota')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Kota lahir</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" autocomplete="tempat_lahir">
                                    <div class="text-danger">
                                        @error('tempat_lahir')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Tanggal lahir</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="date" id="tgl_lahir" name="tgl_lahir" />
                                    <div class="text-danger">
                                        @error('tgl_lahir')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Jenis kelamin</label>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jkelamin" value="Laki-laki" id="laki-laki">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jkelamin" value="Perempuan" id="perempuan">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Perempuan
                                        </label>
                                    </div>
                                    <div class="text-danger">
                                        @error('jkelamin')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Gambar</label>
                            </div>
                            <div class="form-group row">
                                <!-- <div class="row ml-3"> -->
                                <div class="col-md-6 text-md-right">
                                    <img src="{{asset('img')}}/profile-default.png" class="img-thumbnail img-preview" id="anggota-img" width="200" height="200">
                                </div>
                                <div class="input-group col-md-4 ">
                                    <div class="custom-files ">
                                        <input type="file" name="gambar" id="gambar" class="custom-file-input " onchange="previewImg()"><br>
                                        <div class="invalid-feedback">
                                        </div>
                                        <label class="custom-file-label ml-2" for="customFile"></label>
                                    </div>
                                </div>
                                <div class="text-danger">
                                    @error('gambar')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-10 text-md-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var date_input = $('input[name="tgl_lahir"]');
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        var options = {
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    })
</script>
<script>
    function previewImg() {
        const gambar = document.querySelector('#gambar');
        const label = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        label.textContent = gambar.files[0].name;

        const file = new FileReader();
        file.readAsDataURL(gambar.files[0]);

        file.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<script>
    document.gbr.submit();
</script>
@endsection
