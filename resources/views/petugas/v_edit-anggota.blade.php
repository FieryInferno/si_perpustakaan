@extends('layouts.v_template')
@section('title', 'Edit Data Anggota')
@section('content')
<section class="content-header">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data Anggota</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="" data-toggle="modal" data-target="#modal-danger">Kembali</a></li>
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
                        <form action="{{url('simpan-edit-anggota')}}/{{$anggota->kd_anggota}}" id="formtambah" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">No.Anggota</label>

                                <div class="col-md-6">
                                    <h5>{{$anggota->kd_anggota}}</h5>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">No.Identitas</label>

                                <div class="col-md-6">
                                    <h5>{{$anggota->no_identitas}}</h5>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Nama Anggota</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nama_anggota" id="nama_anggota" value="{{$anggota->nama_anggota}}" autocomplete="nama_anggota">
                                    <div class="text-danger">
                                        @error('nama_anggota')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Keanggotaan</label>
                                <div class="col-md-6">
                                    <select class="custom-select" name="keanggotaan" id="status">
                                        <option>Pilih</option>
                                        <option value="Aktif" {{$anggota->keanggotaan == 'Aktif' ? 'selected' : ''}}>Aktif</option>
                                        <option value="Non-aktif" {{$anggota->keanggotaan == 'Non-aktif' ? 'selected' : ''}}>Non-aktif</option>
                                    </select>
                                    <div class="text-danger">
                                        @error('keanggotaan')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Kota lahir</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{$anggota->tempat_lahir}}" autocomplete="tempat_lahir">
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
                                    <input class="form-control" type="date" id="tgl_lahir" value="{{$anggota->tgl_lahir}}" name="tgl_lahir" />
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
                                        <input class="form-check-input" type="radio" name="jkelamin" value="Laki-laki" id="laki-laki" {{ $anggota->jkelamin == 'Laki-laki' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jkelamin" value="Perempuan" id="perempuan" {{ $anggota->jkelamin == 'Perempuan' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Perempuan
                                        </label>
                                    </div>
                                    <div class="text-danger">
                                        @error('jkelamin')
                                        {{ $message }} @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Gambar</label>
                            </div>
                            <div class="form-group row">
                                <!-- <div class="row ml-3"> -->
                                <div class="col-md-6 text-md-right">
                                    <img src="{{asset('img/img-anggota')}}/{{$anggota->gambar}}" class="img-thumbnail img-preview" id="anggota-img" width="200" height="200">
                                </div>
                                <div class="input-group col-md-4 ">
                                    <div class="custom-files ">
                                        <input type="file" name="gambar" id="gambar" class="custom-file-input" onchange="previewImg()"><br>
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
<div class="modal fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Danger Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin tidak ingin mengubah data anggota ini?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                <a class="btn btn-outline-light" href="{{url('anggota')}}">Ok </a>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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
