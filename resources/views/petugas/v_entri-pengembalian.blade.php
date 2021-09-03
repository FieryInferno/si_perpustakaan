@extends('layouts.v_template')
@section('title', 'Entri Pengembalian')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengembalian</h1>
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
            <form action="{{url('temp-pengembalian')}}" id="" method="GET">
              @csrf
              <div class="form-group row">
                <label class="col-md-2 col-form-label text-md-right">Kode Buku</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="id_buku" value="{{ old('id_buku') }}" autofocus>
                  <div class="text-danger">
                    @error('id_buku')
                    {{ $message }}
                    @enderror
                  </div>
                </div>
              </div>
              @include('sweetalert::alert')
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
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <table class="table ">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">No.Transaksi</th>
                <th scope="col">ID Buku</th>
                <th scope="col">Judul Utama</th>
                <th scope="col">Tgl.pinjam</th>
                <th scope="col">Tgl.Jatuh Tempo</th>
                <th scope="col">Terlambat</th>
                <th scope="col">Denda</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <form action="{{ route('transaksi-kembali') }}" method="POST">
                @csrf
                <?php $no = 1; ?>
                @forelse ($pinjam as $pinjam)
                  <?php
                    $tgl1   = $pinjam->jatuh_tempo;
                    $tgl2   = now();
                    $diff   = strtotime($tgl2) - strtotime($tgl1);
                    $cal    = ceil(abs($diff / (86400)) - 1) + 1;
                    $hari   = $cal - 3;
                    $denda  = $cal * 500;
                    if ($pinjam->jatuh_tempo == null) {
                      echo '<tr>';
                      echo ' <td>' . $no++ . '</td>';
                      echo ' <td>' . $pinjam->no_transaksi . '</td>';
                      echo ' <td>' . $pinjam->id_buku . '</td>';
                      echo ' <td>' . $pinjam->judul_utama . '</td>';
                      echo ' <td>' . $pinjam->tgl_pinjam . '</td>';
                      echo ' <td>' . $pinjam->jatuh_tempo . '</td>';
                      echo ' <td> - </td>';
                      echo '<td> - </td>';
                    } else {
                      if ($hari > 3) {
                        echo '<tr class="table-danger">';
                      } else {
                        echo '<tr>';
                      }
                      echo ' <td>' . $no++ . '</td>';
                      echo ' <td>' . $pinjam->no_transaksi . '</td>';
                      echo ' <td>' . $pinjam->id_buku . '</td>';
                      echo ' <td>' . $pinjam->judul_utama . '</td>';
                      echo ' <td>' . $pinjam->tgl_pinjam . '</td>';
                      echo ' <td>' . $pinjam->jatuh_tempo . '</td>';

                      if ($hari > 3) {
                        echo ' <td> ' . $cal . ' Hari</td>';
                        echo '<td> Rp.' . $denda . '</td>';
                      } else {
                        echo ' <td> - </td>';
                        echo '<td> - </td>';
                      }
                    }
                  ?>
                  <td><a href="{{url('pelanggaran')}}/{{$pinjam->no }}" class="btn btn-danger">Pelanggaran</a></td>
                  <input type="text" name="id_buku" value="{{ $pinjam->id_buku }}" hidden>
                  <td><a href="{{ url('hapus-temp-kembali')}}/{{$pinjam->id_buku}}" class="btn btn-info"><i class="fas fa-times"></i></a></td>
                </tr>
                    @empty
                    <div></div>
                    @endforelse
            </tbody>
          </table>
          <div class="col-sm-12 ">
            <div class="input-group mb-3 text-md-center">
              <button class=" btn btn-success" type="submit">Simpan pengembalian</button>&nbsp;
              </form>
              <!-- <button class=" btn btn-danger" type="submit">Batal Peminjaman</button>&nbsp; -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection
