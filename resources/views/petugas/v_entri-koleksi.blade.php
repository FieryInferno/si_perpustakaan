@extends('layouts.v_template')
@section('title', 'Entri Koleksi')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Entri Data Koleksi</h1>
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
            <form action="{{url('/simpan-koleksi')}}" id="formtambah" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                <label class="col-md-2 col-form-label text-md-right">Judul Buku</label>
                <div class="col-md-6">
                  <select class="custom-select" name="bib_id">
                    <option value='' selected>Pilih</option>
                    @foreach( $katalog as $data)
                      <option value="{{$data->bib_id}}">{{$data->bib_id}} | {{$data->judul_utama}} | {{$data->bahan}}</option>
                    @endforeach
                  </select>
                  <div class="text-danger">
                    @error('jenis_sumber')
                      {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label text-md-right">ID Buku</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="id_buku" value="{{ old('id_buku') }}" autocomplete="id_buku" autofocus>
                  <div class="text-danger">
                    @error('id_buku')
                      {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label text-md-right">Tanggal Pengadaan</label>
                <div class="col-md-6">
                  <input class="form-control" type="date" id="tgl_pengadaan" name="tgl_pengadaan" />
                  <div class="text-danger">
                    @error('tgl_pengadaan')
                      {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label text-md-right">Jenis Sumber</label>
                <div class="col-md-6">
                  <select class="custom-select" name="jenis_sumber">
                    <option value='' selected>Pilih</option>
                    <option value="Pembelian">Pembelian</option>
                    <option value="Hadiah/Hibah">Hadiah/Hibah</option>
                    <option value="Penggantian">Penggantian</option>
                    <option value="Pengadaan">Pengadaan</option>
                  </select>
                  <div class="text-danger">
                    @error('jenis_sumber')
                      {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label text-md-right">Nama Sumber</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="nama_sumber" value="{{ old('nama_sumber') }}" autocomplete="nama_sumber" autofocus>
                  <div class="text-danger">
                    @error('nama_sumber')
                      {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label text-md-right">Akses</label>
                <div class="col-md-6">
                  <select class="custom-select" name="akses">
                    <option value='' selected>Pilih</option>
                    <option value="Dapat dipinjam">Dapat dipinjam</option>
                    <option value="Baca ditempat">Baca ditempat</option>
                    <option value="Referensi">Referensi</option>
                  </select>
                  <div class="text-danger">
                    @error('akses')
                      {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-2 col-form-label text-md-right">Ketersediaan</label>
                <div class="col-md-6">
                  <select class="custom-select" name="ketersediaan">
                    <option value='' selected>Pilih</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Rusak">Rusak</option>
                    <option value="Dipinjam">Dipinjam</option>
                    <option value="Dalam Pengadaan">Dalam Pengadaan</option>
                  </select>
                  <div class="text-danger">
                    @error('ketersediaan')
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
