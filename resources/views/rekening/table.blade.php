<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nama</th>
            <th>No Rekening</th>
            <th>Saldo</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rekenings as $rekening)
            <tr>
                <td>{{ $rekening->nama }}</td>
                <td>{{ $rekening->nomor }}</td>
                <td>Rp {{ number_format($rekening->saldo) }}</td>
                <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('rekening.destroy', $rekening->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a class="btn btn-circle btn-warning btn-sm" id="editRekening" name="editRekening"
                            href="{{ route('rekening.edit', $rekening->id) }}" role="button">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-circle btn-danger btn-sm" id="hapusRekening" name="hapusRekening"
                            href="{{ route('rekening.destroy', $rekening) }}" role="button">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
