@extends('layouts.v_template')
@section('title', 'Anggota')
@section('content')
<section class="content-header">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pelanggaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Anggota</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <table id="userstable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>No.Transaksi</th>
                                <th>No.Anggota</th>
                                <th>Nama</th>
                                <th>Buku</th>
                                <th>Pelanggaran</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($pelanggaran as $data)
                            <tr>
                                <td>{{ $no++}}</td>
                                <td>{{$data->no_transaksi}}</td>
                                <td>{{$data->kd_anggota}}</td>
                                <td>
                                    <label>{{$data->nama_anggota}}</label><br>
                                    <span class="badge badge-<?= ($data->status == 'Guru') ? 'warning' : 'success' ?>">{{ ($data->status)}}</span>
                                </td>
                                <td><label>{{ $data->judul_utama}} - {{$data->id_buku}}</label> <br>
                                    {{ $data->tempat_terbit}} : {{ $data->penerbit}}, {{ $data->thn_terbit}} <br>
                                    {{ $data->jumlah_hlm}} ; {{$data->dimensi}} <br>
                                    {{ $data->bahan}}
                                </td>
                                <td>
                                    {{$data->jenis_pelanggaran}}
                                    {{$data->jenis_denda}}
                                </td>
                                <td>{{$data->jumlah_denda}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')

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
