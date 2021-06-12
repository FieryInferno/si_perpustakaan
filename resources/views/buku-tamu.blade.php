<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">

    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="{{asset('bar/')}}/css/main.css" rel="stylesheet" />
    <link href="{{asset('bar/')}}/css/form.css" rel="stylesheet" />
</head>

<body>
    <div class="main">
        <div class="navbar" id="mynavbar">
            <div class="logo">SiPerpus</div>
            <ul class="">
                <li><a href="{{ url('pencarian')}}">HOME</a></li>
                <li><a href="{{ url('pengunjung')}}">KUNJUNGAN</a></li>
                <li><a href="{{ url('buku-tamu')}}" class="active">BUKU TAMU</a></li>
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
            </ul>
        </div>
        <div class="info">
            <div class="head">
                <h1>SELAMAT DATANG di <span>SI Perpus</span></h1>
                <h5>Silakan Isi Formulir Buku Tamu</h5>
                <div class="col-md-4 mt-4 mx-auto">
                    <div class="myform form ">
                        @include('sweetalert::alert')
                        <form action="{{url('entri-buku-tamu')}}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" name="nama" class="form-control my-input" id="nama" placeholder="Nama" value="{{ old('nama') }}" autocomplete="nama" autofocus required>
                                <small class="text-danger">
                                    @error('nama')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="instansi" class="form-control my-input" id="instansi" placeholder="Asal Instansi" value="{{ old('instansi') }}" autocomplete="instansi" required>
                                <small class="text-danger">
                                    @error('instansi')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="form-group mb-3">
                                <textarea type="text" min="0" name="keperluan" id="keperluan" class="form-control my-input" placeholder="Keperluan" required></textarea>
                                <small class="text-danger">
                                    @error('keperluan')
                                    {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class=" btn btn-block send-button tx-tfm">OK</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>
