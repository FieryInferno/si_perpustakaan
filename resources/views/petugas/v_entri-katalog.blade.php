@extends('layouts.v_template')
@section('title', 'Entri Katalog')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
          <h1>Entri Data Katalog</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-body">
            <div class="col-md-12">
              <form action="{{url('/simpan-katalog')}}" id="formtambah" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <label class="col-md-4 col-form-label text-md-right">Jenis Bahan</label>
                  <div class="col-md-6">
                    <select class="custom-select" name="jenis_bahan" id="status">
                        <option value='' selected>Pilih</option>
                        @foreach ($bahan as $data)
                          <option value="{{$data->id}}">{{$data->jenis_bahan}}</option>
                        @endforeach
                    </select>
                    <div class="text-danger">
                      @error('jenis_bahan')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="border p-2">
                  <h2>Data Bibliografis</h2>
                    <div class="card card-outline card-secondary mt-4">
                      <div class=" card-header">
                        <h3 class="card-title">Judul</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group row">
                          <label class="col-md-2 col-form-label text-md-right">Judul Utama</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="judul_utama" id="judul_utama" value="{{ old('judul_utama') }}" autocomplete="judul_utama" autofocus>
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
                            <input type="text" class="form-control" name="judul_sub" value="{{ old('judul_sub') }}" autocomplete="judul_utama" autofocus>
                            <div class="text-danger">
                              @error('judul_sub')
                              {{ $message }}
                              @enderror
                            </div>
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
                            <input type="text" class="form-control" name="pengarang" id="pengarang" value="{{ old('pengarang') }}" autocomplete="pengarang" autofocus>
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
                            <input type="text" class="form-control" name="tempat_terbit" value="{{ old('tempat_terbit') }}" autocomplete="tempat_terbit" autofocus>
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
                            <input type="text" class="form-control" name="penerbit" value="{{ old('penerbit') }}" autocomplete="penerbit" autofocus>
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
                            <input type="text" class="form-control" name="thn_terbit" value="{{ old('thn_terbit') }}" autocomplete="thn_terbit" autofocus>
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
                            <input type="text" class="form-control" name="jumlah_hlm" value="{{ old('jumlah_hlm') }}" autocomplete="jumlah_hlm" autofocus>
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
                            <input type="text" class="form-control" name="dimensi" value="{{ old('dimensi') }}" autocomplete="dimensi" autofocus>
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
                            <input type="text" class="form-control" name="edisi" value="{{ old('edisi') }}" autocomplete="edisi" autofocus>
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
                            <input type="text" class="form-control" name="kelas_ddc" id="kelas_ddc" value="{{ old('kelas_ddc') }}" autocomplete="kelas_ddc" autofocus>
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
                            <input type="text" class="form-control" name="no_panggil" value="{{ old('no_panggil') }}" autocomplete="no_panggil" autofocus>
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
                            <input type="text" class="form-control" name="isbn" value="{{ old('isbn') }}" autocomplete="isbn" autofocus>
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
                            <select class="custom-select" name="jenis_karya">
                              <option selected>Pilih</option>
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
                              <option selected>Pilih</option>
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
