<x-admin-layout headerTitle="Data Orderan Online">
    <div class="text-dark">
        <p>Status Dibayar</p>
    </div>
    <x-card title="Data Orderan Online">
    <table id="myTable" class="table table-responsive table-striped text-dark">
                    <thead>
                        <tr class="text-center border">
                            <th>No.</th>
                            <th>No. Order</th>
                            <th class="col-sm-3">Nama</th>
                            <th class="col-sm-3">Tanggal</th>
                            <th>Orderan</th>
                            <th>Status</th>
                            <th class="col-sm-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="border table-bordered">
                        <tr class="mb-3">
                            <td>1</td>
                            <td>12342</td>
                            <td class="w-15" style="max-width: 100px;">
                                <div class="text-truncate">
                                    Muhammad Irfan Noor Wahid
                                </div>
                            </td>
                            <td>02 September 2023 9:22:57 pm</td>
                            <td>Meja No. 18</td>
                            <td>Dibayar</td>
                            <td class="text-center d-flex justify-content-center border-bottom-0">
                                <a href="/order/dibayar/edit" class="btn btn-primary mr-1" title="Edit Data"><i class="fas fa-edit fa-xs"></i></a>
                                <a href="#" class="btn btn-success mr-1" title="Cetak Nota Dapur"><i class="fas fa-print fa-xs"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
    </x-card>
</x-admin-layout>