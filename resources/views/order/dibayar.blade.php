<x-admin-layout headerTitle="Data Orderan Online">
    <div>
        <div class="text-dark">
            <p>Status Dibayar</p>
        </div>
        <div class="card">
            <div class="card-header text-dark">
                <h6>Data Orderan Online</h6>
            </div>
            <div class="card-body">
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
                                <button type="button" class="btn btn-primary mr-1"><i class="fas fa-edit fa-xs"></i></button>
                                <button type="button" class="btn btn-success mr-1"><i class="fas fa-print fa-xs"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>