<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peminjaman PDF</title>

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
                    <h3><strong>Laporan Peminjaman</strong></h3>
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
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No.Transaksi</th>
                            <th>Barcode Buku</th>
                            <th>Deskripsi Buku</th>
                            <th>Nama Peminjam</th>
                            <th>Tgl.Pinjam</th>
                            <th>Tgl.Kembali</th>
                            <th>Terlambat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($pinjam as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->no_transaksi}}</td>
                            <td>{!! DNS1D::getBarcodeSVG($data->id_buku, "C39", 1, 25, '#2A3239') !!}</td>
                            <td><label>{{ $data->judul_utama}}</label> <br>
                                {{ $data->tempat_terbit}} : {{ $data->penerbit}}, {{ $data->thn_terbit}} <br>
                                {{ $data->jumlah_hlm}} ; {{$data->dimensi}} <br>
                                {{ $data->bahan}}
                            </td>
                            <td>{{$data->nama_anggota}}</td>
                            <td>{{ $data->tgl_pinjam}}</td>
                            <td>{{ $data->jatuh_tempo}}</td>
                            <?php
                            $tgl1 = $data->jatuh_tempo;
                            $tgl2 = now();
                            $diff = strtotime($tgl2) - strtotime($tgl1);
                            $cal = ceil(abs($diff / (86400)) - 1) + 1;
                            if ($data->jatuh_tempo == null) {
                                echo '<td> 2 Semester </td>';
                            } else {
                                if ($cal > 3) {
                                    $hari = $cal - 3;
                                    echo ' <td class="table-danger"> ' . $hari . ' Hari</td>';
                                } else {
                                    echo ' <td> - </td>';
                                }
                            }

                            ?>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
