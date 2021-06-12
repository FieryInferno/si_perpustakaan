@extends('layouts.v_template')
@section('title', 'Kunjungan Anggota')
@section('content')
<section class="content-header">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar Kunjungan Anggota Perpustakaan </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kunjungan</li>
                    <li class="breadcrumb-item active">Anggota</li>
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
                    <form action="{{ route('cari-anggota-kunjungan') }}" method="GET">
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
                                <input type="submit" class=" btn btn-primary" value="Cari">&nbsp;
                                <a href="{{ route('kunjungan-tamu')}}" class=" btn btn-success"><i class="fas fa-sync-alt"></i></a>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div style="width:590px; margin-left:22%;">
                        <table id="userstable" class="table table-responsive table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Anggota</th>
                                    <th>Nama</th>
                                    <th>Tgl. Berkunjung</th>
                                    <th>Jam Berkunjung</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($anggota as $data)
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->kd_anggota }}</td>
                                <td>{{ $data->nama_anggota}}</td>
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
