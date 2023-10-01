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
                <td class="col-2">
                    <img class="img-fluid rounded mb-3" src="{{ asset('storage/gambar-produk/' . $produk->gambar) }}" />
                </td>
                <td class="col-1">{{ $produk->kode }}</td>
                <td class="col-3">{{ $produk->nama }}</td>
                <td class="col-1">{{ $produk->kategori_produk->nama }}</td>
                <td class="col-2">{{ $produk->harga_jual }}</td>
                <td class="col-1">{{ $produk->stok }}</td>
                <td class="col-2">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
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
