<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu</title>
    <style>
        .container {
            position: relative;
        }

        .asset {
            width: 321.25984px;
            height: 204.09449px;
        }

        .profil {
            width: 113.385px;
            height: 113.385px;
            position: absolute;
            bottom: 20px;
            left: 15px;

        }

        .barcode {
            position: absolute;
            bottom: 15px;
            left: 170px;
        }

        .judul {
            position: absolute;
            bottom: 150px;
            left: 10px;
            color: khaki;
            font-size: 18pt;
        }

        .status {
            position: absolute;
            top: 30px;
            /* right: 990px; */
            left: 217px;
            font-size: 20pt;
            color: white;
            text-align: center;
        }

        .nama {
            position: absolute;
            top: 80px;
            left: 170px;
            font-size: 15pt;
            color: brown;
            text-align: center;
        }

        .tgl_create {
            position: absolute;
            top: 115px;
            left: 217px;
            font-size: 10pt;
            color: brown;
            text-align: center;
        }

        /* div {
            background-image: url('img/card-temp.png');
        } */
    </style>
</head>

<body>
    <div class="container">
        <img class="asset" src="{{asset('img/card-temp.png')}}" alt="">
        <div class=barcode>{!! DNS1D::getBarcodeSVG($anggota->kd_anggota, "C39", 1, 40, '#2A3239') !!}</div>
        <!-- <div class=barcode><img src="data:image/png;base64,{{DNS2D::getBarcodePNG($anggota->kd_anggota, 'QRCODE')}}" alt="barcode"></div> -->
        <div class="profile"><img class="profil" src="{{asset('img/img-anggota')}}/{{$anggota->gambar}}" alt=""></div>
        <div class="judul">
            <label>Kartu Anggota <br> SI-Perpus</label>
        </div>
        <div class="status" style="background-color: orange; width:100px;"><label>{{$anggota->status}}</label></div>
        <div class="nama"><label for="nama">{{$anggota->nama_anggota}}</label></div>
        <div class="tgl_create"><label for="tgl_create"><?php $Format = strtotime($anggota->created_at);
                                                        echo date('d M Y', $Format); ?></label></div>


    </div>

</body>

</html>
