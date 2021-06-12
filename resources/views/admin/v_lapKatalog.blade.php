@extends('layouts.v_template')
@section('title', 'Daftar Katalog')
@section('content')
<section class="content-header">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar Katalog</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Katalog</li>
                    <li class="breadcrumb-item active">Daftar Katalog</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<form action="{{ route('cetak-data-katalog-tgl') }}" method="GET">
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
            <div class="card card-success card-outline">
                <div class="card-header">
                    <a href="{{route('cetak-data-katalog')}}" type="submit" class=" btn btn-primary" target="_blank">Cetak PDF Semua Data</a>
                </div>
                <div class="card-body">
                    <table id="userstable" class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Sampul</th>
                                <th>BIBID</th>
                                <th>Judul</th>
                                <th>Edisi</th>
                                <th>Penerbitan/Publikasi</th>
                                <th>Deskripsi Fisik</th>
                                <th>Jenis Bahan</th>
                                <th>Nomor Panggil</th>
                                <th>Eksemplar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($data as $data)
                            <!-- <td><input type="checkbox" value="{{$data['id_katalog']}}" id="check"></td> -->
                            <td>{{ $no++}}</td>
                            <td> <img src="{{asset('img/img-katalog')}}/{{$data['sampul_depan'] }} " class=" img-thumbnail img-preview" width="200" height="200">
                            </td>
                            <td>{{ $data['id_katalog']}}</td>
                            <td>{{ $data['judul_utama']}}</td>
                            <td><?= ($data['edisi'] == null) ? '(belum diset)' : $data['edisi'] ?></td>
                            <td>{{ $data['tempat_terbit']}} : {{ $data['penerbit']}},{{ $data['thn_terbit']}}</td>
                            <td>{{ $data['jumlah_hlm']}} ; {{$data['dimensi']}}</td>
                            <td>{{ $data['bahan']}}</td>
                            <td>{{ $data['no_panggil']}}</td>
                            <td><?= ($data['eksemplar'] == null) ? '(Kosong)' : $data['eksemplar'] ?></td>
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
