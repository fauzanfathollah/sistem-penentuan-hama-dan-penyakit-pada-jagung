<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Sistem Jagung</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">SJ</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
            </li>

            @if(auth()->user()->role == 'Admin')
            <li class="menu-header">Manajemen Data</li>
            <li class="{{ request()->routeIs('pengguna.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pengguna.index') }}">
                    <i class="fas fa-users"></i><span>Kelola Pengguna</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('kriteria.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kriteria.index') }}">
                    <i class="fas fa-list-alt"></i><span>Kelola Kriteria</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->role == 'Ahli')
            <li class="menu-header">Data Ahli</li>
            <li class="{{ request()->routeIs('gejala.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('gejala.index') }}">
                    <i class="fas fa-bug"></i><span>Data Gejala</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('hasil-keputusan.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('hasil-keputusan.index') }}">
                    <i class="fas fa-check-circle"></i><span>Hasil Keputusan</span>
                </a>
            </li>
            @endif

            @if(auth()->user()->role == 'Petani')
            <li class="menu-header">Petani</li>
            <li class="{{ request()->routeIs('riwayat.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('riwayat.index') }}">
                    <i class="fas fa-history"></i><span>Riwayat Gejala</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('deteksi.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('deteksi.index') }}">
                    <i class="fas fa-search-location"></i><span>Deteksi Hama</span>
                </a>
            </li>
            @endif
        </ul>
    </aside>
</div>
