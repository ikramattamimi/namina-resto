<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Namina <sup>Resto</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}" style="padding: 5px 25px">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities" href="#"
            aria-expanded="true" aria-controls="collapseUtilities" style="padding: 5px 25px">
            <i class="far fa-bell"></i></i>
            <span>Orderan Online</span>
        </a>
        <div class="collapse" id="collapseUtilities" data-parent="#accordionSidebar" aria-labelledby="headingUtilities">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/admin/order/pendingDanProses">Pending & Proses</a>
                <a class="collapse-item" href="/admin/order/dibayar">Dibayar</a>
                <a class="collapse-item" href="/admin/order/dibatalkan">Dibatalkan</a>
                <a class="collapse-item" href="/admin/order/invoice">Invoice</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities2" href="#"
            aria-expanded="true" aria-controls="collapseUtilities" style="padding: 5px 25px">
            <i class="far fa-bell"></i></i>
            <span>Orderan Online Kasir</span>
        </a>
        <div class="collapse" id="collapseUtilities2" data-parent="#accordionSidebar" aria-labelledby="headingUtilities">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/kasir/order/pendingDanProses">Pending & Proses</a>
                <a class="collapse-item" href="/kasir/order/dibayar">Dibayar</a>
                <a class="collapse-item" href="/kasir/order/dibatalkan">Dibatalkan</a>
                <a class="collapse-item" href="/kasir/order/invoice">Invoice</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Item - Pelanggan -->
    <li class="nav-item {{ str_contains(url()->current(), 'pelanggan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pelanggan.index') }}" style="padding: 5px 25px">
            <i class="fas fa-fw fa-users"></i>
            <span>Pelanggan</span></a>
    </li>

    <!-- Nav Item - Rekening -->
    <li class="nav-item {{ str_contains(url()->current(), 'rekening') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('rekening.index') }}" style="padding: 5px 25px">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Rekening</span></a>
    </li>

    <!-- Nav Item - Kode QR Meja -->
    <li class="nav-item {{ str_contains(url()->current(), 'meja') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('meja.index') }}" style="padding: 5px 25px">
            <i class="fas fa-fw fa-qrcode" aria-hidden="true"></i>
            <span>Kode QR Meja</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Bahan Baku
    </div>

    <!-- Nav Item - Bahan Baku -->
    <li class="nav-item {{ str_contains(url()->current(), 'bahanBaku') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('bahanBaku.index') }}" style="padding: 5px 25px">
            <i class="fas fa-fw fa-users"></i>
            <span>Master Data</span></a>
    </li>

    <li class="nav-item {{ request()->is('pelanggan/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pelanggan.index') }}" style="padding: 5px 25px">
            <i class="fas fa-fw fa-users"></i>
            <span>Pembelian</span></a>
    </li>

    <li class="nav-item {{ request()->is('pelanggan/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pelanggan.index') }}" style="padding: 5px 25px">
            <i class="fas fa-fw fa-users"></i>
            <span>Pengeluaran</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
