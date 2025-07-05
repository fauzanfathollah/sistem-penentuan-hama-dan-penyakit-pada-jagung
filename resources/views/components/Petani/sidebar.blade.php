<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">.</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">.</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Menu</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('petani.dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('gejala.index') }}">Manage Gejala</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('riwayat.index') }}">Riwayat Gejala</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('hasilKeputusan.index') }}">Hasil Keputusan</a>
                    </li>

                </ul>
            </li>
        </ul>
    </aside>
</div>
