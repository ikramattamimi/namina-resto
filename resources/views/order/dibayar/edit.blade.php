<x-admin-layout headerTitle="Orderan Online Detail">
    <div>
        <div class="card text-dark mb-3" style="border-left: 4px solid green;">
            <div class="card-body py-2">
            <i class="fas fa-info fa-sm" style="color: #000000;"></i>  Note:
            <p class="mb-1">Halaman ini detail transaksi yang dilakukan secara online</p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="container text-dark">
                    <div class="row mb-3">
                        @if(isset($pesanan[0]))
                        <div class="col">
                            <h5>
                                <i class="fas fa-globe fa-lg" style="color: #000000;"></i>
                                No. Orderan: {{$pesanan[0]->kode}}
                            </h5>
                        </div>
                        <div class="col">
                            <div class="text-right">
                            
                                <h5>Tanggal: {{ \Carbon\Carbon::parse($pesanan[0]->created_at)->format('d F Y H:i:s') }}</h5>
                            
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm">
                            <p class="mb-0">Dari</p>
                            <p class="mb-0 font-weight-bold">Namina Resto & Private Resto</p>
                            <p class="mb-0">
                                Jl. Raya Garut - Cikajang No.km 14, Sirnagalih, Cisurupan, Kabupaten Garut, Jawa Barat 44163
                            </p>
                            <p class="mb-0">
                                Telp 0262 2543686 / WA 081220088980
                            </p>
                            <p class="mb-0">
                                Tlpn/wa: 02622543686 / 081220088980
                            </p>
                            <p class="mb-0">
                                Email: naminaprivateresto@gmail.com
                            </p>     
                        </div>
                        @foreach($pelanggan as $p)
                        <div class="col-sm w-25">
                            <p class="mb-0">Pembeli</p>
                            <p class="mb-0 font-weight-bold">{{$p->nama}}</p>
                            <p class="mb-0">Tlpn/Wa: {{$p->no_hp}}</p>
                            <p class="mb-0"><span class="font-weight-bold">Orderan:</span> Meja No. {{$p->no_meja}}</p>
                        </div>
                        <div class="col-sm">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="font-weight-bold">
                                        Status Orderan
                                    </div>
                                    <p>{{$p->nama_status}}</p>
                                </div>
                                <div class="col-sm">
                                    <div class="font-weight-bold">
                                        Status Dapur
                                    </div>
                                    <p>-</p>  
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="table-responsive">
                <table id="myTable" class="table table-striped mb-4 text-dark">
                    <thead>
                        <tr class="text-center border">
                            <th class="col-sm-1">No.</th>
                            <th class="col-sm-1">Gambar</th>
                            <th class="col-sm-2">Nama Produk</th>
                            <th class="col-sm-1">Harga</th>
                            <th class="col-sm-2">Catatan</th>
                            <th class="col-sm-1">Qty</th>
                            <th class="col-sm-1">Diskon</th>
                            <th class="col-sm-1">Subtotal</th>
                            <th class="col-sm-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="border table-bordered">
                        @php 
                            $counter = 1;
                            $total = 0;
                        @endphp
                        @foreach($pesanan as $data)
                        <tr class="mb-3">
                            <td>{{$counter}}</td>
                            <td><img src="/template/img/{{$data->gambar}}" style="width:100px; heigth:100px"></td>
                            <td>{{$data->nama_produk}}</td>
                            <td>{{$data->harga_jual}}</td>
                            <td>{{$data->catatan_produk}}</td>
                            <td>{{$data->qty}}</td>
                            <td>{{$data->diskon}}</td>
                            <td>{{ $data->harga_jual * $data->qty - $data->diskon}}</td>
                            @php
                                $total += $data->harga_jual * $data->qty - $data->diskon;
                                $kode = $data->kode;
                            @endphp
                            <td class="text-center d-flex justify-content-center border-bottom-0">
                                    <button class="btn btn-light mr-1 border"><i class="far fa-trash-alt" style="color: #000000;"></i></button>
                            </td>
                        </tr>
                        @php 
                            $counter++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="/order/dibayar" class="btn btn-default float-right mr-2 border text-dark">Kembali</a>
                    </div>
                </div>
            <div>
        </div>
    </div>

    @push('scripts')
        @include('order.pending-dan-proses.script')
    @endpush
</x-admin-layout>