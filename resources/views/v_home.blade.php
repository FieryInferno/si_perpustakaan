<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template')}}/dist/css/adminlte.min.css">
    <!-- Toastr -->
    <script src="{{ asset('template')}}/plugins/toastr/toastr.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('template')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        body {
            /* background-color: #1e6c93;   */
            background-image: url('https://source.unsplash.com/BtbjCFUvBXs/1920x1080');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

        }

        #menu {
            margin-top: 5%;
            margin-left: 26%;
            margin-bottom: 5px;
        }

        a {
            margin-left: 25%;
            margin-bottom: 10px;
        }

        .card {
            width: 15rem;

        }

        .card-header {
            border: none;

        }

        .masthead {
            height: 20vh;
            min-height: 50px;
            /* background-image: url('https://source.unsplash.com/1593012369860/1920x1080'); */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            /* color: white; */
            margin-top: 5%;
        }
    </style>
</head>

<body>
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-light">Sistem Informasi Perpustakaan</h1>
                    <p class="lead">A great starter layout for a landing page</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row" id="menu">
            <div class="col col-md-4">
                <div class="card h-80 justify-content-center">
                    <p class="card-header">Office</p>
                    @if (Route::has('login'))
                    @auth
                    @if(Auth::user()->is_admin == 0)
                    <li><span>|</span></li>
                    <li><a href="{{ route('petugas') }}">OFFICE</a></li>
                    @endif
                    @if(Auth::user()->is_admin == 1)
                    <li><span>|</span></li>
                    <li><a href="{{ route('admin') }}">OFFICE</a></li>
                    @endif
                    @else
                    <li><span>|</span></li>
                    <li><a href="{{route('login')}}">LOGIN</a></li>
                    @endif
                    @endauth
                </div>
                <div class="card h-80 ">
                    <p class="card-header">Kunjungan</p>
                    <a href="">
                        <img src="{{asset('img')}}/asset/book.png" />
                    </a>
                </div>
            </div>
            <div class="col col-md-4">
                <div class="card h-80">
                    <p class="card-header">Buku Tamu
                    </p>
                    <a href="">
                        <img src="{{asset('img')}}/asset/guests-book.png" />
                    </a>
                </div>
                <div class="card h-80">
                    <p class="card-header">Pencarian
                    </p>
                    <a href="{{url('pencarian')}}">
                        <img src="{{asset('img')}}/asset/search-book.png" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
