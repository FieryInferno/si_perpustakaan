<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">

    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link href="{{asset('bar/')}}/css/main.css" rel="stylesheet" />
</head>

<body>
    <div class="main">
        <div class="navbar" id="mynavbar">
            <div class="logo">SiPerpus</div>
            <ul class="">
                <li><a href="{{ url('pencarian')}}">HOME</a></li>
                <li><a href="{{ url('pengunjung')}}" class="active">KUNJUNGAN</a></li>
                <li><a href="{{url('buku-tamu')}}">BUKU TAMU</a></li>
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
        <!-- </div>-->

        <div class="info">
            <div class="head">
                <h1>SELAMAT DATANG di <span>SI Perpus</span></h1>
                <p>Total Pengujung Hari ini {{$kunjungan->count()}}</p>
            </div>
            <div class="s003">@include('sweetalert::alert')
                <form action="{{url('entri-kunjungan')}}" method="POST">
                    @csrf
                    <div class="inner-form">
                        <div class="input-field second-wrap">
                            <input id="search" name="kd_anggota" type="text" placeholder="masukan kode anggota" />
                        </div>
                        <div class="input-field third-wrap">
                            <button class="btn-search" type="submit ">
                                <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="submit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script src="{{asset('bar/')}}/js/extention/choices.js"></script>
    <script>
        const choices = new Choices('[data-trigger]', {
            searchEnabled: false,
            itemSelectText: '',
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>
