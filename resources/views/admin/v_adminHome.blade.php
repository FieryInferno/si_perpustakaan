@extends('layouts.v_template')
@section('title', 'Dashboard')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ol>
      </div>
    </div>
  </div>
</section>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$kunjungan->count()}}</h3>

                  <p>Pengunjung Hari ini</p>
                </div>
                <div class="icon">
                  <i class="fas fa-door-open"></i>
                </div>
                <a href="{{route('laporan-kunjungan')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$anggota->count()}}</h3>
                  <p>Anggota Aktif</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="{{route('laporan-data-anggota')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$peminjaman->count()}}</h3>

                  <p>Peminjaman</p>
                </div>
                <div class="icon">
                  <i class="far fa-bookmark"></i>
                </div>
                <a href="{{route('laporan-peminjaman')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                  <div class="inner">
                    <h3>{{$pengembalian->count()}}</h3>

                    <p>Pengembalian</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-bookmark"></i>
                  </div>
                  <a href="{{route('laporan-pengembalian')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Peminjaman dan Pengembalian</h3>
          </div>
        </div>
        <div class="card-body">
          <div class="position-relative mb-4">
            <canvas id="sales-chart" height="200"></canvas>
          </div>

          <div class="d-flex flex-row justify-content-end">
            <span class="mr-2">
              <i class="fas fa-square text-primary"></i> Peminjaman
            </span>
            <span>
              <i class="fas fa-square text-gray"></i> Pengembalian
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
