 <!-- nav Menu -->
 <nav class="mt-2">
     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

         @if(Auth::user()->is_admin == 1)
         <li class="nav-item">
             <a href="{{ route('admin') }}" class="nav-link {{ request()->is('dashboard-admin') ? 'active' : '' }}">
                 <i class="nav-icon fas fa-tachometer-alt"></i>
                 <p>
                     Dashboard
                 </p>
             </a>
         </li>
         @endif
         @if(Auth::user()->is_admin == 0)
         <li class="nav-item">
             <a href="{{route('petugas')}}" class="nav-link {{ request()->is('dashboard-petugas') ? 'active' : '' }}">
                 <i class="nav-icon fas fa-tachometer-alt"></i>
                 <p>
                     Dashboard
                 </p>
             </a>
         </li>
         @endif
         @if(Auth::user()->is_admin == 1)
         <li class="nav-header">Laporan</li>
         <li class="nav-item">
             <a href="{{route('laporan-data-anggota')}}" class="nav-link {{ request()->is('laporan-data-anggota') ? 'active' : '' }}">
                 <i class="fas fa-user-friends"></i>
                 <p>Anggota</p>
             </a>
         </li>
         <li class="nav-item">
             <a href="{{route('laporan-katalog')}}" class="nav-link {{ request()->is('laporan-katalog') ? 'active' : '' }}">
                 <i class="fas fa-book"></i>
                 <p>Katalog</p>
             </a>
         </li>
         <li class="nav-item">
             <a href="{{route('laporan-koleksi')}}" class="nav-link {{ request()->is('laporan-koleksi') ? 'active' : '' }}">
                 <i class="fas fa-file"></i>
                 <p>Koleksi</p>
             </a>
         </li>
         <li class="nav-item">
             <a href="{{route('laporan-peminjaman')}}" class="nav-link {{ request()->is('laporan-peminjaman') ? 'active' : '' }}">
                 <i class="fas fa-file"></i>
                 <p>Peminjaman</p>
             </a>
         </li>
         <li class="nav-item">
             <a href="{{route('laporan-pengembalian')}}" class="nav-link {{ request()->is('laporan-pengembalian') ? 'active' : '' }}">
                 <i class="fas fa-file"></i>
                 <p>Pengembalian</p>
             </a>
         </li>
         <li class="nav-item">
             <a href="{{route('laporan-pelanggaran')}}" class="nav-link {{ request()->is('laporan-pelanggaran') ? 'active' : '' }}">
                 <i class="fas fa-minus-circle"></i>
                 <p>Pelanggaran</p>
             </a>
         </li>
         <li class="nav-item">
             <a href="{{route('laporan-kunjungan')}}" class="nav-link {{ request()->is('laporan-kunjungan') ? 'active' : '' }}">
                 <i class="fas fa-door-closed"></i>
                 <p>Kunjungan</p>
             </a>
         </li>
         <li class="nav-item">
             <a href="{{route('laporan-tamu')}}" class="nav-link {{ request()->is('laporan-tamu') ? 'active' : '' }}">
                 <i class="fas fa-door-open"></i>
                 <p>Tamu</p>
             </a>
         </li>
         @endif
         @if(Auth::user()->is_admin == 0)
         <li class="nav-item">
             <a href="{{ route('data-anggota') }}" class="nav-link {{ request()->is('anggota') ? 'active' : '' }}">
                 <i class="nav-icon fas fa-users"></i>
                 <p>Keanggotaan</p>
             </a>
         </li>
         <!-- Akuisisi -->
         <li class="nav-item">
             <a href="#" class="nav-link {{ request()->is('entri-koleksi','koleksi') ? 'active' : '' }}">
                 <i class="nav-icon fas fa-book"></i>
                 <p>
                     Akuisisi
                     <i class="fas fa-angle-left right"></i>
                 </p>
             </a>
             <ul class="nav nav-treeview">
                 <li class="nav-item">
                     <a href="{{ route('entri-koleksi') }}" class="nav-link {{ request()->is('entri-koleksi') ? 'active' : '' }}">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Entri Koleksi</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('koleksi') }}" class="nav-link {{ request()->is('koleksi') ? 'active' : '' }}">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Daftar Koleksi</p>
                     </a>
                 </li>
             </ul>
         </li>
         <!-- Katalog -->
         <li class="nav-item">
             <a href="#" class="nav-link {{ request()->is('entri-katalog','katalog') ? 'active' : '' }}">
                 <i class="nav-icon fas fa-book"></i>
                 <p>
                     Katalog
                     <i class="fas fa-angle-left right"></i>
                 </p>
             </a>
             <ul class="nav nav-treeview  ">
                 <li class="nav-item">
                     <a href="{{ route('entri-katalog') }}" class="nav-link {{ request()->is('entri-katalog') ? 'active' : '' }}">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Entri Katalog</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('katalog') }}" class="nav-link {{ request()->is('katalog') ? 'active' : '' }}">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Daftar Katalog</p>
                     </a>
                 </li>
             </ul>
         </li>
         <!-- Sirkulasi -->
         <li class="nav-item">
             <a href="#" class="nav-link {{ request()->is('entri-peminjaman','peminjaman', 'daftar-peminjaman','pengembalian','data-pelanggaran') ? 'active' : '' }}">
                 <i class="fas fa-sync nav-icon"></i>
                 <p>
                     Sirkulasi
                     <i class="fas fa-angle-left right"></i>
                 </p>
             </a>
             <ul class="nav nav-treeview ">
                 <li class="nav-item ">
                     <a href="{{ route('peminjaman') }}" class="nav-link {{ request()->is('peminjaman','entri-peminjaman') ? 'active' : '' }}">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Entri Peminjaman</p>
                     </a>
                 </li>
                 <li class="nav-item ">
                     <a href="{{ route('daftar-peminjaman') }}" class="nav-link {{ request()->is('daftar-peminjaman') ? 'active' : '' }}">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Daftar Peminjaman</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('entri-pengembalian') }}" class="nav-link {{ request()->is('entri-pengembalian') ? 'active' : '' }}">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Entri Pengembalian</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('pengembalian') }}" class="nav-link {{ request()->is('pengembalian') ? 'active' : '' }}">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Pengembalian</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('data-pelanggaran') }}" class="nav-link {{ request()->is('data-pelanggaran') ? 'active' : '' }}">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Pelanggaran</p>
                     </a>
                 </li>

             </ul>
         </li>
         <li class="nav-item">
             <a href="#" class="nav-link {{ request()->is('kunjungan-tamu', 'kunjungan-anggota') ? 'active' : '' }}">
                 <i class="nav-icon fas fa-book"></i>
                 <p>
                     Kunjungan
                     <i class="fas fa-angle-left right"></i>
                 </p>
             </a>
             <ul class="nav nav-treeview">
                 <li class="nav-item">
                     <a href="{{ route('kunjungan-anggota')}}" class="nav-link">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Anggota</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('kunjungan-tamu')}}" class="nav-link {{ request()->is('kunjungan-tamu') ? 'active' : '' }}">
                         <i class="far fa-circle nav-icon"></i>
                         <p>Tamu</p>
                     </a>
                 </li>
             </ul>
         </li>
         @endif
         @if(Auth::user()->is_admin == 1)
         <li class="nav-header">Pengguna</li>
         <li class="nav-item">
         <li class="nav-item">
             <a class="nav-link {{ request()->is('pengguna') ? 'active' : '' }}" href="{{ url('pengguna') }}">
                 <i class="fas fa-users-cog"></i>
                 <p>Hak Akses</p>
             </a>
         </li>
         </li>
         @endif
         <li class="nav-header">Profil</li>
         <li class="nav-item">
         <li class="nav-item">
             <a class="nav-link {{ request()->is('profil') ? 'active' : '' }}" href="{{ url('profil') }}">
                 <i class="nav-icon fas fa-users"></i>
                 <p>Profile Saya</p>
             </a>
         </li>
         </li>
         <li class="nav-item">
             <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link">
                 <i class="nav-icon fas fa-sign-out-alt"></i>
                 <p>Logout</p>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
             </a>
         </li>
 </nav>
