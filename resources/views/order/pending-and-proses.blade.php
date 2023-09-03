@extends('welcome')

@section('content')
    <div>
        <div class="text-dark">
            <h3>Data Orderan Online <span class="font-weight-bold">Pusat Garut</span></h3>
            <p>Status Pending & Proses</p>
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
                            <th class="col-sm-1">No. Order</th>
                            <th class="col-2">Nama</th>
                            <th>Whatsapp</th>
                            <th scope="col">Orderan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Status Dapur</th>
                            <th scope="col">Aksi</th>
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
                            <td>0812333455595</td>
                            <td class="text-center">
                                <p class="mb-1">Meja No. 14</p>
                                <p class="small mb-1">02 September 2023 9:22:57 pm</p>
                            </td>
                            <td class="text-center text-warning font-weight-bold">Pending</td>
                            <td class="text-center">-</td>
                            <td class="text-center d-flex justify-content-center border-bottom-0">
                                <button type="button" class="btn btn-warning mr-1"><i class="fas fa-pencil-alt fa-xs"></i></button>
                                <button type="button" class="btn btn-primary mr-1"><i class="fas fa-edit fa-xs"></i></button>
                                <button type="button" class="btn btn-success mr-1"><i class="fas fa-print fa-xs"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection