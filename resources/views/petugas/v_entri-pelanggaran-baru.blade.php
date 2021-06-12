@extends('layouts.v_template')
@section('title', 'Entri Koleksi')
@section('content')
<section class="content-header">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Entri Data Pelanggaran</h1>
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
                        <form action="{{url('/simpan-pelanggaran')}}" method="POST">
                            @csrf

                            <input type="text" name="no_transaksi" value="{{$pelanggaran->no_transaksi}}" hidden>
                            <input type="text" name="id_buku" value="{{$pelanggaran->id_buku}}" hidden>


                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Jenis Pelanggaran</label>
                                <div class="col-md-6">
                                    <select class="custom-select" name="jenis_pelanggaran">
                                        <option value='' selected>Pilih</option>
                                        <option value="Rusak">Rusak</option>
                                        <option value="Hilang">Hilang</option>
                                        <option value="Hilang">Rusak-Telat</option>
                                    </select>
                                    <div class="text-danger">
                                        @error('jenis_pelanggaran')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Jenis Denda</label>
                                <div class="col-md-6">
                                    <select class="custom-select" name="jenis_denda">
                                        <option value='' selected>Pilih</option>
                                        <option value="Ganti Koleksi yang Sama">Ganti Koleksi yang Sama</option>
                                        <option value="Ganti Koleksi yang Baru">Ganti Koleksi yang Baru</option>
                                        <option value="Ganti Uang">Ganti Uang</option>
                                    </select>
                                    <div class="text-danger">
                                        @error('jenis_denda')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Denda</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="jumlah_denda" value="{{ old('denda') }}" autocomplete="denda" autofocus>
                                    <div class="text-danger">
                                        @error('jumlah_denda')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8 text-md-right">
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
        var date_input = $('input[name="tgl_pengadaan"]');
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
<script>
    $(document).ready(function() {
        // var ddc = "322.2"
        // var pengarang = "Armana"
        // var judul = "Pagi"
        // var ddc = document.querySelector('#kelas_ddc').value;
        // var pengarang = document.querySelector('#pengarang').value
        // var judul = document.querySelector('#judul').value
        var ddc = document.getElementById('kelas_ddc').value
        var pengarang = document.getElementById('pengarang').value
        var judul = document.getElementById('judul_utama').value
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
