@extends('layouts.v_template')
@section('title', 'Daftar Peminjam')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Daftar Peminjaman</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Sirkulasi</li>
          <li class="breadcrumb-item active">Daftar Peminjaman</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-12">
      <div class="card card-primary card-outline">
        <div class="card-tools"></div>
        <div class="card-body">
          <!-- Start Table -->
          <div class="table-responsive">
            <table id="userstable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>No.Transaksi</th>
                  <th>Barcode Buku</th>
                  <th>Deskripsi Buku</th>
                  <th>Nama Peminjam</th>
                  <th>Tgl.Pinjam</th>
                  <th>Tgl.Kembali</th>
                  <th>Terlambat</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                @foreach($pinjam as $data)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->no_transaksi}}</td>
                    <td>{!! DNS1D::getBarcodeSVG($data->id_buku, "C39", 1, 25, '#2A3239') !!}</td>
                    <td><label>{{ $data->judul_utama}}</label> <br>
                        {{ $data->tempat_terbit}} : {{ $data->penerbit}}, {{ $data->thn_terbit}} <br>
                        {{ $data->jumlah_hlm}} ; {{$data->dimensi}} <br>
                        {{ $data->jenis_bahan}}
                    </td>
                    <td>{{ $data->nama_anggota}}</td>
                    <td>{{ tgl_indo($data->tgl_pinjam) }}</td>
                    <td>{{ tgl_indo($data->jatuh_tempo) }}</td>
                    <?php
                    $tgl1 = $data->jatuh_tempo;
                    $tgl2 = $data->tgl_kembali;
                    $diff = strtotime($tgl2) - strtotime($tgl1);
                    
                    if ($diff > 0) {
                      $cal = ceil(abs($diff / (86400)) - 1) + 1;
                      if ($cal > 3) {
                        $hari = $cal - 3;
                        echo ' <td class="table-danger"> ' . $hari . ' Hari</td>';
                      } else {
                        echo ' <td> - </td>';
                      }
                    } else {
                      echo ' <td> - </td>';
                    }
                    

                    ?>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(function() {
    $("#userstable1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
