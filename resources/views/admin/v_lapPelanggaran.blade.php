@extends('layouts.v_template')
@section('title', 'Pelanggaran')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pelanggaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tamu</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<form action="{{ route('cetak-data-pelanggaran-tgl') }}" method="GET">
    @csrf
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Tanggal awal</label>
        <div class="col-md-3">
            <input class="form-control" type="date" id="tgl_awal" name="tgl_awal" />
            <div class="text-danger">
                @error('tgl_awal')
                {{ $message }}
                @enderror
            </div>
        </div>
        <label class="col-md-2 col-form-label text-md-right">Tanggal akhir</label>
        <div class="col-md-3">
            <input class="form-control" type="date" id="tgl_akhir" name="tgl_akhir" />
            <div class="text-danger">
                @error('tgl_akhir')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-2">&nbsp;&nbsp;
            <input type="submit" class=" btn btn-primary" target="_blank" value="PDF Per Tanggal">&nbsp;
        </div>
    </div>
</form>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <a href="{{route('cetak-data-pelanggaran')}}" type="submit" class=" btn btn-primary" target="_blank">Cetak PDF Semua Data</a>
                </div>
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


<script>
    $(document).ready(function() {
        var date_input = $('input[name="tgl_awal"]');
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
    $(document).ready(function() {
        var date_input = $('input[name="tgl_akhir"]');
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
