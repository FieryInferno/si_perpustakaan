@extends('layouts.v_template')
@section('title', 'Daftar Koleksi')
@section('content')
<section class="content-header">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar Koleksi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Koleksi</li>
                    <li class="breadcrumb-item active">Daftar Koleksi</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@include('sweetalert::alert')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-tools"></div>
                <div class="card-body">
                    <table id="userstable" class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Barcode</th>
                                <th>ID Buku</th>
                                <th>Tanggal Pengadaan</th>
                                <th>Data Bibliografis</th>
                                <th>Jenis Sumber</th>
                                <th>Akses</th>
                                <th>Ketersediaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($koleksi as $data)
                            <td>{{ $no++}}</td>
                            <td>{!! DNS1D::getBarcodeSVG($data->id_buku, "C39", 1, 25, '#2A3239') !!}</td>
                            <td><a href="{{url('edit-koleksi')}}/{{$data->id_buku}}">{{$data->id_buku}}</a></td>
                            <td><?php $Format = strtotime($data->tgl_pengadaan);
                                echo date('d M, Y', $Format); ?></td>
                            <td><label>{{ $data->judul_utama}}</label> <br>
                                {{ $data->tempat_terbit}} : {{ $data->penerbit}}, {{ $data->thn_terbit}} <br>
                                {{ $data->jumlah_hlm}} ; {{$data->dimensi}} <br>
                                {{ $data->bahan}}
                            </td>
                            <td>{{ $data->jenis_sumber}}</td>
                            <td>{{ $data->akses}}</td>
                            <td>{{ $data->ketersediaan}}</td>
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
