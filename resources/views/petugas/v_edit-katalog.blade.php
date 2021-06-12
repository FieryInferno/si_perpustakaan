@extends('layouts.v_template')
@section('title', 'Entri Katalog')
@section('content')
<section class="content-header">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data Katalog</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item" data-toggle="modal" data-target="#modal-danger"><a href="{{route('katalog')}}">&laquo; Kembali</a></li>
                </ol>
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
                        <div class="col-sm-12">
                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item active">
                                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Katalog</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " id="custom-tabs-four-koleksi-tab" data-toggle="pill" href="#custom-tabs-four-koleksi" role="tab" aria-controls="custom-tabs-four-koleksi" aria-selected="false">Koleksi</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <div class="tab-pane fade show active " id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                            <form action="{{url('simpan-edit-katalog')}}/{{$katalog->bib_id}}" id="formedit" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-md-4 col-form-label text-md-right">Jenis Bahan</label>
                                                    <div class="col-md-6">
                                                        <select class="custom-select" name="jenis_bahan" id="status" disabled>
                                                            <option value="{{$katalog->id_bahan}}" selected>{{$katalog->bahan}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <h2>Data Bibliografis</h2>
                                                <div class="card card-outline card-secondary mt-4">
                                                    <div class=" card-header">
                                                        <h3 class="card-title">Judul</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-md-right">Bib ID</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" value="{{$katalog->bib_id}}" disabled>
                                                                <input type="text" class="form-control" name="bib_id" value="{{$katalog->bib_id}}" hidden>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label text-md-right ">Gambar</label>
                                                    </div>
                                                    <div class="form-group row ">
                                                        <div class="col-md-4 text-md-right">
                                                            <img src="{{asset('img/img-katalog')}}/{{$katalog->sampul_depan}} " class=" img-thumbnail img-preview" id="anggota-img" width="200" height="200">
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
                                                        <label class="col-md-2 col-form-label text-md-right">Judul Utama</label>
                                                        <div class="col-md-6">

                                                            <input type="text" class="form-control" id="judul_utama" name="judul_utama" value="{{ $katalog->judul_utama }}" autocomplete="judul_utama">
                                                            <div class="text-danger">
                                                                @error('judul_utama')
                                                                {{ $message }}
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-2 col-form-label text-md-right">Anak Judul</label>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="judul_sub" value="{{ $katalog->judul_sub }}" autocomplete="judul_utama">
                                                            <div class="text-danger">
                                                                @error('judul_sub')
                                                                {{ $message }}
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="card card-outline card-secondary mt-4">
                                                    <div class=" card-header">
                                                        <h3 class="card-title">Tajuk Pengarang</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-md-right">Nama Pengarang</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="pengarang" id="pengarang" value="{{ $katalog->pengarang}}" autocomplete="pengarang">
                                                                <div class="text-danger">
                                                                    @error('pengarang')
                                                                    {{ $message }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card card-outline card-secondary mt-4">
                                                    <div class=" card-header">
                                                        <h3 class="card-title">Penerbitan</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-md-right">Tempat Terbit</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="tempat_terbit" value="{{ $katalog->tempat_terbit }}" autocomplete="tempat_terbit">
                                                                <div class="text-danger">
                                                                    @error('tempat_terbit')
                                                                    {{ $message }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-md-right">Penerbit</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="penerbit" value="{{ $katalog->penerbit }}" autocomplete="penerbit">
                                                                <div class="text-danger">
                                                                    @error('penerbit')
                                                                    {{ $message }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-md-right">Tahun Terbit</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="thn_terbit" value="{{ $katalog->thn_terbit }}" autocomplete="thn_terbit">
                                                                <div class="text-danger">
                                                                    @error('thn_terbit')
                                                                    {{ $message }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card card-outline card-secondary mt-4">
                                                    <div class=" card-header">
                                                        <h3 class="card-title">Deskripsi Fisik</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-md-right">Jumlah Halaman</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="jumlah_hlm" value="{{ $katalog->jumlah_hlm }}" autocomplete="jumlah_hlm">
                                                                <div class="text-danger">
                                                                    @error('jumlah_hlm')
                                                                    {{ $message }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-md-right">Dimensi</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="dimensi" value="{{ $katalog->dimensi }}" autocomplete="dimensi">
                                                                <div class="text-danger">
                                                                    @error('dimensi')
                                                                    {{ $message }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card card-outline  mt-4">
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-md-right">Edisi</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="edisi" value="{{ $katalog->edisi }}" autocomplete="edisi">
                                                                <div class="text-danger">
                                                                    @error('edisi')
                                                                    {{ $message }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-md-right">No. Kelas DDC</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="kelas_ddc" value="{{ $katalog->kelas_ddc }}" autocomplete="kelas_ddc">
                                                                <div class="text-danger">
                                                                    @error('kelas_ddc')
                                                                    {{ $message }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-md-right">No. Panggil</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" id="no_panggil" value="{{ $katalog->no_panggil }}" name="no_panggil" autocomplete="no_panggil">
                                                                <div class="text-danger">
                                                                    @error('no_panggil')
                                                                    {{ $message }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-md-right">ISBN</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" name="isbn" value="{{ $katalog->isbn }}" autocomplete="isbn">
                                                                <div class="text-danger">
                                                                    @error('isbn')
                                                                    {{ $message }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-md-right">Jenis Karya</label>
                                                            <div class="col-md-6">
                                                                <select class="custom-select" name="jenis_karya" id="status">
                                                                    <option value="{{$katalog->id_karya}}" selected>{{$katalog->karya}}</option>
                                                                    @foreach ($karya as $data)
                                                                    <option value="{{$data->id}}">{{$data->jenis_karya}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="text-danger">
                                                                    @error('id_karya')
                                                                    {{ $message }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label text-md-right">Bahasa</label>
                                                            <div class="col-md-6">
                                                                <select class="custom-select" name="bahasa" id="bahasa">
                                                                    <option value="{{$katalog->id_bahasa}}" selected>{{$katalog->bahasa}}</option>
                                                                    @foreach ($bahasa as $data)
                                                                    <option value="{{$data->id}}">{{$data->bahasa}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="text-danger">
                                                                    @error('bahasa')
                                                                    {{ $message }}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-10 text-md-right">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-koleksi" role="tabpanel" aria-labelledby="custom-tabs-four-koleksi-tab">
                                        <label for="Koleksi">Daftar Koleksi dari Katalog - {{$katalog->bib_id}} | {{$katalog->judul_utama}}</label>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Barcode</th>
                                                    <th scope="col">Judul Utama</th>
                                                    <th scope="col">Akses</th>
                                                    <th scope="col">Ketersediaan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1; ?>
                                                @if($koleksi->all() < 0 ) <tr>
                                                    <td colspan="5" class="text-center"><label>Koleksi Belum Tersedia</label></td>
                                                    </tr>
                                                    @else
                                                    @foreach ($koleksi->all() as $data)
                                                    <tr>
                                                        <th scope="row">{{ $no++ }}</th>
                                                        <td>{{$data['id_buku']}}</td>
                                                        <td>{{$data['judul_utama']}}</td>
                                                        <td>{{$data['akses']}}</td>
                                                        <td>{{$data['ketersediaan']}}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

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
<script>
    $(document).ready(function() {
        var ddc = "322.2";
        var pengarang = "Armana";
        var judul = "Pagi";
        // var ddc = document.querySelector('#kelas_ddc').value;
        // var pengarang = document.querySelector('#pengarang').value
        // var judul = document.querySelector('#judul_utama').value

        var ddc = document.getElementById("kelas_ddc").value;
        var pengarang = document.getElementById("pengarang").value;
        var judul = document.getElementById("judul_utama").value;
        document.getElementById("label").value = ddc;
        var alias = pengarang.slice(0, 3).toLowerCase();
        var huruf = judul.slice(0, 1).toLowerCase();
        var result = ddc + ' ' + alias + ' ' + huruf;
        $("#no_panggil").keypress(function() {
            document.getElementById("no_panggil").value = result;
        });
        $("#no_panggil").keydown(function() {
            document.getElementById("no_panggil").value = result;
        });
    });
</script>
@endsection
