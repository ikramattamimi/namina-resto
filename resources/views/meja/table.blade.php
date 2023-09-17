<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nomor Meja</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @for ($nomor = 1; $nomor <= $meja->jumlah; $nomor++)
            <tr>
                <td>{{ $nomor }}</td>
                <td>
                    <a class="btn btn-circle btn-warning btn-sm" id="editmeja" name="editmeja" href="#"
                        role="button">
                        <i class="fas fa-edit"></i>
                    </a>
                    <!-- Button trigger modal lihat -->
                    <a class="btn btn-circle btn-success btn-sm" data-toggle="modal"
                        data-target="#code-{{ $nomor }}" type="button">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>

            @include('meja.modal')
        @endfor
    </tbody>
</table>
