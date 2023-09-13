<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <span>GLAZE APPLICATION</span>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <span>GA</span>
        </div>
        <ul class="sidebar-menu">
            @if (auth()->user()->type == 'admin')
            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin.home') }}"><i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Report</li>
            <li class="nav-item dropdown {{ Request::is('admin/data', 'admin/data/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i>
                    <span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin.data') }}">Laporan GA</a></li>
                    <li><a disabled href="#"><del>Laporan Pinjaman Tools</del></a></li>
                    <li><a disabled href="#"><del>Laporan Stock Tinta</del></a></li>
                    <li><a disabled href="#"><del>Laporan Stock Tools</del></a></li>
                </ul>
            </li>
            <li class="menu-header">Setting</li>
            <li class="nav-item dropdown {{ Request::is('admin/user', 'admin/user/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i>
                    <span>Setting</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('user.create') }}">Tambah Karyawan</a></li>
                    <li><a class="nav-link" href="{{ route('user.index') }}">Daftar Karyawan</a></li>
                </ul>
            </li>
            @endif
            @if (auth()->user()->type == 'user')
            <li class="active"><a class="nav-link" href="{{ route('user.home') }}"><i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li><a class="nav-link" href="{{ route('glaze.create') }}"><i class="fas fa-tachometer-alt"></i>
                    <span>Masukan Data</span></a>
            </li>
            <li class="menu-header">Report</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i>
                    <span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('glaze.index') }}">Laporan GA</a></li>
                    <li><a href="#">Laporan Stock Glaze</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </aside>
</div>