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
    <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard-admin') }}" style="padding: 10px 25px">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    {{-- jika user admin atau kasir --}}
    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ str_contains(url()->current(), 'order') ? 'active' : '' }}">
        <a class="nav-link {{ !str_contains(url()->current(), 'order') ? 'collapsed' : '' }}" data-toggle="collapse" data-target="#collapseUtilities" href="#" aria-expanded="true" aria-controls="collapseUtilities" style="padding: 10px 25px">
            <i class="far fa-bell"></i>
            <span>Orderan Online</span>
        </a>
        <div class="collapse {{ str_contains(url()->current(), 'order') ? 'show' : '' }}" id="collapseUtilities" data-parent="#accordionSidebar" aria-labelledby="headingUtilities">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ str_contains(url()->current(), 'pendingDanProses') ? 'active' : '' }}" href="/order/pendingDanProses">Pending & Proses</a>
                <a class="collapse-item {{ str_contains(url()->current(), 'dibayar') ? 'active' : '' }}" href="/order/dibayar">Dibayar</a>
                <a class="collapse-item {{ str_contains(url()->current(), 'dibatalkan') ? 'active' : '' }}" href="/order/dibatalkan">Dibatalkan</a>
                <a class="collapse-item {{ str_contains(url()->current(), 'invoice') ? 'active' : '' }}" href="/order/invoice">Invoice</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->
    @endif

    {{-- jika user admin --}}
    @if (Auth::user()->role_id == 1)
    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Master Data
    </div> -->

    <!-- Nav Item - Pelanggan -->
    <li class="nav-item {{ str_contains(url()->current(), 'pelanggan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pelanggan.index') }}" style="padding: 10px 25px">
            <i class="fas fa-fw fa-users"></i>
            <span>Pelanggan</span></a>
    </li>

    <!-- Nav Item - Produk -->
    <li class="nav-item {{ str_contains(url()->current(), 'produk') || str_contains(url()->current(), 'kategori') ? 'active' : '' }}">
        <a class="nav-link {{ !str_contains(url()->current(), 'produk') ? 'collapsed' : '' }}" data-toggle="collapse" data-target="#menu-master-produk" href="#" aria-expanded="true" aria-controls="menu-master-produk" style="padding: 10px 25px">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Produk</span>
        </a>
        <div class="collapse {{ str_contains(url()->current(), 'produk') || str_contains(url()->current(), 'kategori') ? 'show' : '' }}" id="menu-master-produk" data-parent="#accordionSidebar" aria-labelledby="headingUtilities">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ str_contains(url()->current(), 'kategori') ? 'active' : '' }}" href="{{ route('kategori.index') }}">Kategori</a>
                <a class="collapse-item {{ str_contains(url()->current(), 'produk') ? 'active' : '' }}" href="{{ route('produk.index') }}">Produk Satuan</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Rekening -->
    <li class="nav-item {{ str_contains(url()->current(), 'rekening') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('rekening.index') }}" style="padding: 10px 25px">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Rekening</span></a>
    </li>

    <!-- Nav Item - Kode QR Meja -->
    <li class="nav-item {{ str_contains(url()->current(), 'meja') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('meja.index') }}" style="padding: 10px 25px">
            <i class="fas fa-fw fa-qrcode" aria-hidden="true"></i>
            <span>Kode QR Meja</span></a>
    </li>
    <!-- Divider -->
    <!-- <hr class="sidebar-divider d-none d-md-block"> -->
    @endif

    {{-- jika user admin atau gudang --}}
    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Bahan Baku
    </div> -->

    <!-- Nav Item - Bahan Baku -->
    <li class="nav-item {{ str_contains(url()->current(), 'bahanBaku') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('bahanBaku.index') }}" style="padding: 10px 25px">
            <i class="fas fa-fw fa-hamburger"></i>
            <span>Bahan Baku</span></a>
    </li>

    <li class="nav-item {{ str_contains(url()->current(), 'pembelianBahanBaku') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pembelianBahanBaku.index') }}" style="padding: 10px 25px">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Pembelian Bahan Baku</span></a>
    </li>

    <li class="nav-item {{ str_contains(url()->current(), 'penguranganBahanBaku') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('penguranganBahanBaku.index') }}" style="padding: 10px 25px">
            <i class="fas fa-fw fa-shopping-basket"></i>
            <span>Pengurangan Bahan Baku</span></a>
    </li>

    @endif

    {{-- jika user admin --}}
    @if (Auth::user()->role_id == 1)

    <li class="nav-item {{ str_contains(url()->current(), 'pengeluaranRestoran') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pengeluaranRestoran.index') }}" style="padding: 10px 25px">
            <i class="fas fa-fw fa-shopping-bag"></i>
            <span>Pengeluaran Restoran</span></a>
    </li>

    <li class="nav-item {{ str_contains(url()->current(), 'kelolaPengguna') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kelolaPengguna.index') }}" style="padding: 10px 25px">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Kelola Pengguna</span></a>
    </li>
    <!-- Nav Item - Laporan -->
    <li class="nav-item {{ str_contains(url()->current(), 'laporan') ? 'active' : '' }}">
        <a class="nav-link {{ !str_contains(url()->current(), 'laporan') ? 'collapsed' : '' }}" data-toggle="collapse" data-target="#laporan-menu" href="#" aria-expanded="true" aria-controls="laporan-menu" style="padding: 10px 25px">
            <i class="far fa-fw fa-file"></i>
            <span>Laporan</span>
        </a>
        <div class="collapse {{ str_contains(url()->current(), 'laporan') ? 'show' : '' }}" id="laporan-menu" data-parent="#accordionSidebar" aria-labelledby="headingUtilities">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ str_contains(url()->current(), 'laporanPembelianBahanBaku') ? 'active' : '' }}" href="/admin/laporanPembelianBahanBaku">Pembelian Bahan Baku</a>
                <a class="collapse-item {{ str_contains(url()->current(), 'laporanPenguranganBahanBaku') ? 'active' : '' }}" href="/admin/laporanPenguranganBahanBaku">Pengurangan Bahan Baku</a>
                <a class="collapse-item {{ str_contains(url()->current(), 'laporanPengeluaranRestoran') ? 'active' : '' }}" href="/admin/laporanPengeluaranRestoran">Pengeluaran Restoran</a>
            </div>
        </div>
    </li>
    @endif



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>