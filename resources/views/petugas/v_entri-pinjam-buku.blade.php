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
            <div class="col-sm-12">
              <div class="card card-primary card-outline card-outline-tabs">
                  <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                      <li class="nav-item active">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Detail Anggota</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link " id="custom-tabs-four-histori-tab" data-toggle="pill" href="#custom-tabs-four-histori" role="tab" aria-controls="custom-tabs-four-histori" aria-selected="false">History Peminjaman</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                      <div class="tab-pane fade show active " id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <div class="row no-gutters">
                          <div class="col-sm-3">
                            <img src="{{asset('img/img-anggota')}}/{{$anggota->gambar}} " class=" img-thumbnail img-preview" id="anggota-img" width="200" height="200">
                          </div>
                          <div class="col-sm-9">
                            <div class="list-group-item">
                              <table>
                                <tr>
                                  <td><span class="badge badge-<?= ($anggota->status == 'Siswa') ? 'success' : 'warning' ?>">{{ ($anggota->status)}}</span></td>
                                </tr>
                                <tr>
                                  <td>Id Anggota &nbsp;</td>
                                  <td>:</td>
                                  <td> &nbsp; {{$anggota->kd_anggota}}</td>
                                </tr>
                                <tr>
                                  <td>Nama Anggota &nbsp;</td>
                                  <td>:</td>
                                  <td> &nbsp; {{$anggota->nama_anggota}}</td>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <hr>
                          @include('sweetalert::alert')
                          <div class="col-sm-12">
                            <div class="card text-white bg-primary mb-3 mt-5">
                              <div class="card-body">
                                <form action="{{url('pilih-buku')}}" id="formtambah" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <div class="form-group row">
                                    <div class="text-danger col-2 col-md-6 col-form-label">
                                      @error('id_buku')
                                        <script>
                                          $(function() {
                                            $(document).Toasts('create', {
                                              class: 'bg-maroon',
                                              autohide: true,
                                              delay: 5000,
                                              title: 'Pesan!',
                                              position: 'bottomRight',
                                              icon: 'fas fa-exclamation fa-lg',
                                              body: '{{ $message }}'
                                            })
                                          });
                                        </script>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-md-3 col-form-label text-md-right">ID Buku/Barcode</label>
                                    <div class="col-md-6">
                                      <div class="input-group mb-3">
                                        <input type="text" name="kd_anggota" value="{{ $anggota->kd_anggota }}" hidden>
                                        <input type="text" class="form-control @error('id_buku') is-invalid @enderror" name="id_buku" placeholder="Masukkan ID Buku" autocomplete="id_buku" autofocus>
                                        <div class="input-group-append">
                                          <button class="btn btn-warning" style="color:white;" type="submit">Ok</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <label for="">Daftar Buku</label>
                            <form action="{{ route('transaksi-pinjam') }}" method="POST">
                              <table class="table" id="bukuTable">
                                <thead>
                                  <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Barcode</th>
                                    <th scope="col">Judul Utama</th>
                                    <th scope="col">Tgl.pinjam</th>
                                    <th scope="col">Tgl.Jatuh Tempo</th>
                                    <th scope="col">Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @csrf
                                    <?php $no = 1; ?>
                                    @forelse ($koleksi as $koleksi)
                                      <tr>
                                        <td>{{ $no++}}</td>
                                        <td>{{ $koleksi->id_buku}} <input type="text" name="id_buku[]" value="{{ $koleksi->id_buku }}" hidden></td>
                                        <td>{{ $koleksi->judul_utama }}</td>
                                        <td>{{ tgl_indo($koleksi->tgl_pinjam) }}<input type="text" name="tgl_pinjam[]" value="{{ $koleksi->tgl_pinjam }}" hidden></td>
                                        <td>{{ tgl_indo($koleksi->jatuh_tempo) }}<input type="text" name="jatuh_tempo[]" value="{{ $koleksi->jatuh_tempo }}" hidden></td>
                                        <td><a href="{{ url('hapus-temp')}}/{{$koleksi->id_buku}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                                        <td><input type="text" name="kd_anggota[]" value="{{ $anggota->kd_anggota }}" hidden></td>
                                      </tr>
                                    @empty
                                      <tr>
                                          <td colspan="7" class="text-md-center"><strong>Tidak ada buku yang dipilih! <br> Silakan input buku</strong></td>
                                      </tr>
                                    @endforelse
                                </tbody>
                              </table>
                              <div class="col-sm-12 ">
                                <div class="input-group mb-3 text-md-center">
                                  <button class=" btn btn-success" type="submit">Simpan Peminjaman</button>&nbsp;
                                </div>
                              </div>
                            </form>
                          </div>

                            <div class="col-sm-8"><label for="">Daftar Buku Yang Sedang Dipinjam</label></div>
                            <div class="col-sm-12">
                              <table class="table" id="histori">
                                <thead>
                                  <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Barcode</th>
                                    <th scope="col">Judul Utama</th>
                                    <th scope="col">Tgl.pinjam</th>
                                    <th scope="col">Tgl.Jatuh Tempo</th>
                                    <th scope="col">Terlambat</th>
                                    <th scope="col">Denda</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $no = 1; ?>
                                  @forelse ($pinjam as $pinjam)
                                    <?php
                                      $tgl1   = $pinjam->jatuh_tempo;
                                      $tgl2   = now();
                                      $diff   = strtotime($tgl2) - strtotime($tgl1);
                                      $cal    = ceil(abs($diff / (86400)) - 1) + 1;
                                      $hari   = $cal - 3;
                                      $denda  = $cal * 500;

                                      if ($pinjam->id_jenis_bahan == 1 || $pinjam->id_jenis_bahan == 2) {
                                        echo '<tr>';
                                        echo ' <td> ' . $no++ . '</td>';
                                        echo ' <td> ' . $pinjam->id_buku . '</td>';
                                        echo ' <td> ' . $pinjam->judul_utama . '</td>';
                                        echo ' <td> ' . tgl_indo($pinjam->tgl_pinjam) . '</td>';
                                        echo ' <td> ' . tgl_indo($pinjam->jatuh_tempo) . '</td>';
                                        echo ' <td> - </td>';
                                        echo '<td> - </td>';
                                      } else {
                                        if ($hari > 3) {
                                          echo '<tr class="table-danger">';
                                        } else {
                                          echo '<tr>';
                                        }
                                        echo ' <td> ' . $no++ . '</td>';
                                        echo ' <td> ' . $pinjam->id_buku . '</td>';
                                        echo ' <td> ' . $pinjam->judul_utama . '</td>';
                                        echo ' <td> ' . tgl_indo($pinjam->tgl_pinjam) . '</td>';
                                        echo ' <td> ' . tgl_indo($pinjam->jatuh_tempo) . '</td>';
                                        if ($hari > 3) {
                                          echo ' <td> ' . $cal . ' Hari</td>';
                                          echo '<td> Rp.' . $denda . '</td>';
                                        } else {
                                          echo ' <td> - </td>';
                                          echo '<td> - </td>';
                                        }
                                      }
                                    ?>
                                    </tr>
                                    @empty
                                    <tr>
                                      <td colspan="7" class=" text-md-center">
                                        <strong>Tidak ada buku yang dipinjam</strong>
                                      </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                              </table>
                            </div>
                        </div>
                      </div>
                      <!-- History -->
                      <div class="tab-pane fade" id="custom-tabs-four-histori" role="tabpanel" aria-labelledby="custom-tabs-four-histori-tab">
                        <label for="Koleksi">Daftar Histori Peminjaman - {{$anggota->kd_anggota}} | {{$anggota->nama_anggota}}</label>
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Barcode</th>
                              <th scope="col">Judul Utama</th>
                              <th scope="col">Tgl.Pinjam</th>
                              <th scope="col">Tgl.Dikembalikan</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; ?>
                            @forelse ($histori as $histori)
                              <tr>
                                <td>{{ $no++}}</td>
                                <td>{{ $histori->id_buku}}</td>
                                <td>{{ $histori->judul_utama }}</td>
                                <td>{{ tgl_indo($histori->tgl_pinjam) }}</td>
                                <td>{{ tgl_indo($histori->jatuh_tempo) }}</td>
                              </tr>
                              @empty
                              <div class="col-sm-12 text-md-center">
                                <strong>Belum ada Buku yang diPinjam</strong>
                              </div>
                            @endforelse
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

</script>

@endsection
