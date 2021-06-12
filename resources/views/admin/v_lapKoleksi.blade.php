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
<form action="{{ route('cetak-data-koleksi-tgl') }}" method="GET">
    @csrf
    <div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Tanggal awal</label>
        <div class="col-md-3">
            <input class="form-control" type="date" id="tgl_awal" name="tgl_awal" value="{{ old('tgl_awal') }}" />
            <div class="text-danger">
                @error('tgl_awal')
                {{ $message }}
                @enderror
            </div>
        </div>
        <label class="col-md-2 col-form-label text-md-right">Tanggal akhir</label>
        <div class="col-md-3">
            <input class="form-control" type="date" id="tgl_akhir" name="tgl_akhir" value="{{ old('tgl_akhir') }}" />
            <div class="text-danger">
                @error('tgl_akhir')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-2">&nbsp;&nbsp;
            <input type="submit" class=" btn btn-primary" target="_blank" value="PDF Per Tanggal">
        </div>
    </div>
</form>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-danger card-outline">
                <div class="card-header">
                    <a href="{{route('cetak-data-koleksi')}}" type="submit" class=" btn btn-primary" target="_blank">Cetak PDF Semua Data</a>
                </div>
                <div class="card-body">

                    <table id="userstable" class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <!-- <th><input type="checkbox" value="s"></th> -->
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
                            @foreach ($data as $data)
                            <!-- <td><input type="checkbox" value="{{$data->id_buku}}" id="check"></td> -->
                            <td>{{ $no++}}</td>
                            <td>{!! DNS1D::getBarcodeSVG($data->id_buku, "C39", 1, 25, '#2A3239') !!}</td>
                            <td>{{$data->id_buku}}</td>
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
