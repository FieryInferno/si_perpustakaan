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
@include('sweetalert::alert')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-tools"></div>
        <div class="card-body">
          <!-- Start Table -->
          <table id="userstable1" class="table table-responsive table-bordered table-striped">
            <thead>
              <tr>
                <!-- <th><input type="checkbox" value="s"></th> -->
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
                <!-- <th>Detail</th> -->
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              @foreach ($katalog as $data)
                <!-- <td><input type="checkbox" value="{{$data['id_katalog']}}" id="check"></td> -->
                  <td>{{ $no++}}</td>
                  <td> <img src="{{asset('img/img-katalog')}}/{{$data['sampul_depan'] }} " class=" img-thumbnail img-preview" width="200" height="200">
                  </td>
                  <td>{{ $data['id_katalog']}}</td>
                  <td><a href="{{url('edit-katalog')}}/{{$data['id_katalog']}}">{{ $data['judul_utama']}}</a></td>
                  <td><?= ($data['edisi'] == null) ? '(belum diset)' : $data['edisi'] ?></td>
                  <td>{{ $data['tempat_terbit']}} : {{ $data['penerbit']}},{{ $data['thn_terbit']}}</td>
                  <td>{{ $data['jumlah_hlm']}} ; {{$data['dimensi']}}</td>
                  <td>{{ $data['bahan']}}</td>
                  <td>{{ $data['no_panggil']}}</td>
                  <td><?= ($data['eksemplar'] == null) ? '(belum diset)' : $data['eksemplar'] ?></td>
                  <!-- <td><a href="" class="btn btn-primary"><i class="fas fa-clipboard-list"></i></a></td> -->
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
            // "responsive": true,
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
