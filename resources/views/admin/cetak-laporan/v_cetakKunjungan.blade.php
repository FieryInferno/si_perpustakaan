<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kunjungan PDF</title>

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
                    <h3><strong>Laporan Kunjungan Perpustakaan</strong></h3>
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
                    <table class="table table-bordered table-striped">
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
