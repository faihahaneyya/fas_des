 {{-- start header --}}
 <header class="header">
     <nav class="nav-container">
         <div class="logo">Sistem Desa</div>

         <ul class="nav-menu">
             <li><a href="{{ route('dashboard') }}">Beranda</a></li>
             <li><a href="{{ route('tentang') }}">Tentang</a></li>
             <li><a href="{{ route('kontak') }}">Kontak</a></li>
             <li><a href="{{ route('users.index') }}">User</a></li>
         </ul>

         <div class="nav-actions">
             <div class="user-info">
                 <span>👤</span>
                 <span>Selamat datang, <strong>Faiha</strong></span>
             </div>
             <a href="{{ route('auth.logout') }}" class="btn-logout">Keluar</a>
         </div>
     </nav>
 </header>
 {{-- end header --}}
