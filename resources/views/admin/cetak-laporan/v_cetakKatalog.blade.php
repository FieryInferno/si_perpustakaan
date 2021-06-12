<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog PDF</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template')}}/dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper mx-2">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-book-open"></i> SI Perpus
                        <small class="float-right"></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-8 invoice-col">
                    <h3><strong>Laporan Data Katalog Perpustakaan</strong></h3>
                </div>

                <div class="col-sm-4 invoice-col">
                    <b>Tanggal : <?php echo date('D, d M Y') ?></b><br>
                    <br>
                    <table>
                        <tr>
                            <th>Petugas</th>
                            <td>&nbsp;{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <th>Akses</th>
                            <td>&nbsp;{{ Auth::user()->is_admin == 0 ? 'petugas' : 'admin' }}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table id="userstable" class="table  table-bordered table-striped">
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
                <!-- /.col -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
