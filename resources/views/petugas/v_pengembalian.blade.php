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
                    <li class="breadcrumb-item active">Daftar Pengembalian</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-tools"></div>
                <div class="card-body">
                    <!-- Start Table -->
                    <table id="userstable" class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">No.Transaksi</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Buku</th>
                                <th scope="col">Tgl.Pinjam</th>
                                <th scope="col">Tgl.Dikembalikan</th>
                                <th scope="col">Terlambat</th>
                                <th scope="col">Pelanggaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($pinjam as $data)

                            <td>{{ $no++}}</td>
                            <td>{{ $data->no_transaksi}}</td>
                            <td>{{ $data->nama_anggota}}<span class="badge badge-<?= ($data->status == 'Guru') ? 'warning' : 'success' ?>">{{ ($data->status)}}</span></td>
                            <td><label>{{ $data->judul_utama}} - {{$data->id_buku}}</label> <br>
                                {{ $data->tempat_terbit}} : {{ $data->penerbit}}, {{ $data->thn_terbit}} <br>
                                {{ $data->jumlah_hlm}} ; {{$data->dimensi}} <br>
                                {{ $data->bahan}}
                            </td>
                            <td>{{ $data->tgl_pinjam }}</td>
                            <td>{{ $data->tgl_kembali }}</td>
                            <?php
                            $tgl1 = $data->jatuh_tempo;
                            $tgl2 = now();
                            $diff = strtotime($tgl2) - strtotime($tgl1);
                            $cal = ceil(abs($diff / (86400)) - 1) + 1;
                            if ($data->jatuh_tempo == null) {
                                echo '<td> - </td>';
                            } else {
                                if ($cal > 3) {
                                    $hari = $cal - 3;
                                    echo ' <td class="table-danger"> ' . $hari . ' Hari</td>';
                                } else {
                                    echo ' <td> - </td>';
                                }
                            }
                            ?> <td><a href="{{url('pelanggaran')}}/{{$data->no_transaksi}}" class="btn btn-danger"><i class="fas fa-plus"></i></a></td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
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
