<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Gambar</th>
            <th>Kode Barang</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produks as $produk)
            <tr>
                <td>{{ $produk->gambar }}</td>
                <td>{{ $produk->kode }}</td>
                <td>{{ $produk->nama }}</td>
                <td>{{ $produk->kategori_produk->nama }}</td>
                <td>{{ $produk->harga_jual }}</td>
                <td>{{ $produk->stok }}</td>
                <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        {{-- <a class="btn btn-circle btn-primary btn-sm" id="detailProduk"
                            name="detailProduk" href="#" role="button">
                            <i class="fas fa-info-circle"></i>
                        </a> --}}
                        <a class="btn btn-circle btn-warning btn-sm" id="editProduk" name="editProduk"
                            href="{{ route('produk.edit', $produk->id) }}" role="button">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-circle btn-danger btn-sm" id="hapusProduk" name="hapusProduk"
                            href="{{ route('produk.destroy', $produk->id) }}" role="button">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
