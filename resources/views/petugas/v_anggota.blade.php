@extends('layouts.v_template')
@section('title', 'Anggota')
@section('content')
<section class="content-header">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Keanggotaan Anggota</h1>
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
                <div class="card-header">
                    <a href="{{route('entri-anggota')}}" class="btn btn-success">Entri Anggota</a>
                </div>
                <div class="card-body">
                    <!-- Start Table -->
                    <table id="userstable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Gambar</th>
                                <th>No. Anggota</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Keanggotaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($users as $data)
                            <tr>
                                <td>{{ $no++}}</td>
                                <td><img src="{{ asset('img')}}/img-anggota/{{ $data->gambar}}" alt="{{ $data->nama_anggota}}" id="gambar" width="113.385px" height="113.385px"></td>
                                <td>{{ $data->kd_anggota}}</td>
                                <td><a href="" data-toggle="modal" data-target="#modal-info-{{$data->id}}">{{ $data->nama_anggota}}</a></td>
                                <td>{{ $data->status}}</td>
                                <!-- <td> {!! DNS1D::getBarcodeSVG($data->kd_anggota, "C39", 1, 25, '#2A3239') !!}</td> -->
                                <!-- <td><img src="data:image/png;base64,{{DNS2D::getBarcodePNG($data->kd_anggota, 'QRCODE')}}" alt="barcode"></td> -->
                                <!-- <td>{{ $data->jkelamin}}</td> -->
                                <td><span class="badge badge-<?= ($data->keanggotaan == 'Aktif') ? 'success' : 'danger' ?>">{{ ($data->keanggotaan)}}</span></td>
                                <td>
                                    <!-- <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-info-{{$data->id}}"><i class="fas fa-info-circle"></i></a>&nbsp; -->
                                    <a href="{{url('kartu')}}/{{$data->kd_anggota}}" class="btn btn-primary"><i class="fas fa-print"></i></a>
                                    <a href="{{url('edit-anggota')}}/{{$data->kd_anggota}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>&nbsp;|&nbsp;
                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger-{{$data->kd_anggota}}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Gambar</th>
                                <th>No Anggota</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Keanggotaan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- Start Detail Modal -->
                @foreach ($users as $detail)
                <div class="modal fade" id="modal-info-{{$detail->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content bg-info">
                            <div class="modal-header">
                                <h4 class="modal-title">Detail Anggota</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4>{{$detail->nama_anggota}} - {{$detail->kd_anggota}}</h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="row">No.Identitas</th>
                                            <td>{{ $detail->no_identitas}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Status</th>
                                            <td>{{ $detail->status}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tempat/Tanggal Lahir</th>
                                            <td>{{ $detail->tempat_lahir}}, {{ $detail->tgl_lahir}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Jenis Kelamin</th>
                                            <td>{{ $detail->jkelamin}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Keanggotaan</th>
                                            <td><span class="badge badge-<?= ($data->keanggotaan == 'Aktif') ? 'success' : 'danger' ?>">{{ ($data->keanggotaan)}}</span></td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Tanggal Mendaftar</th>
                                            <td>{{ $detail->created_at}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h6 class="float-right">Perubahan terakhir : {{ $detail->updated_at}}</h6>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <div class="modal fade" id="modal-danger-{{$detail->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                            <div class="modal-header">
                                <h4 class="modal-title">Danger Modal</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus data ini?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                                <a class="btn btn-outline-light" href="{{url('hapus-anggota')}}/{{$detail->kd_anggota}}">Ok </a>

                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                @endforeach
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
