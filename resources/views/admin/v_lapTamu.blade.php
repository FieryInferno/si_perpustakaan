@extends('layouts.v_template')
@section('title', 'Tamu')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tamu</h1>
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
<form action="{{ route('cetak-data-tamu-tgl') }}" method="GET">
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
                    <a href="{{route('cetak-data-tamu')}}" type="submit" class=" btn btn-primary" target="_blank">Cetak PDF Semua Data</a>
                </div>
                <div class="card-body">
                    <div style="width:630px; margin-left:20%;">
                        <table id="userstable" class="table table-responsive table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Instansi</th>
                                    <th>Keperluan</th>
                                    <th>Tgl. Berkunjung</th>
                                    <th>Jam Berkunjung</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($tamu as $data)
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nama}}</td>
                                <td>{{ $data->instansi}}</td>
                                <td>{{ $data->keperluan}}</td>
                                <td><?php $Format = strtotime($data->tgl);
                                    echo date('d M, Y', $Format); ?></td>
                                <td><?php $Format = strtotime($data->tgl);
                                    echo date("H:i", $Format); ?></td>
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
