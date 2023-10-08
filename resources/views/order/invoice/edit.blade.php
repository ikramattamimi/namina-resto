<x-admin-layout headerTitle="Orderan Online Detail">
    <div>
        <div class="card">
            <div class="card-body">
                <div class="container text-dark">
                    <div class="row mb-3">
                        @if (isset($pesanan[0]))
                            <div class="col">
                                <h5>
                                    <i class="fas fa-globe fa-lg" style="color: #000000;"></i>
                                    No. Orderan: {{ $pesanan[0]->kode }}
                                </h5>
                            </div>
                            <div class="col">
                                <div class="text-right">

                                    <h5>Tanggal:
                                        {{ \Carbon\Carbon::parse($pesanan[0]->created_at)->format('d F Y H:i:s') }}</h5>

                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm">
                            <p class="mb-0">Dari</p>
                            <p class="mb-0 font-weight-bold">Namina Resto & Private Resto</p>
                            <p class="mb-0">
                                Jl. Raya Garut - Cikajang No.km 14, Sirnagalih, Cisurupan, Kabupaten Garut, Jawa Barat
                                44163
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
                        @foreach ($pelanggan as $p)
                            <div class="col-sm w-25">
                                <p class="mb-0">Pembeli</p>
                                <p class="mb-0 font-weight-bold">{{ $p->nama }}</p>
                                <p class="mb-0">Tlpn/Wa: {{ $p->no_hp }}</p>
                                <p class="mb-0"><span class="font-weight-bold">Orderan:</span> Meja No.
                                    {{ $p->no_meja }}</p>
                            </div>
                            <div class="col-sm">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="font-weight-bold">
                                            Status Orderan
                                        </div>
                                        <p>{{ $p->nama_status }}</p>
                                        @if (isset($pesanan[0]))
                                            <form
                                                action="{{ route('order.pending-dan-proses.update-status', ['id' => $pesanan[0]->kode]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input name="status_id" type="hidden" value="2">
                                                <button class="btn btn-sm btn-primary" type="submit">Proses
                                                    pesanan</button>
                                            </form>
                                        @endif
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
                            <td><img src="/storage/gambar-produk/{{$data->gambar}}" style="width:100px; heigth:100px"></td>
                            <td>{{$data->nama_produk}}</td>
                            <td>{{$data->harga_jual}}</td>
                            <td>{{$data->catatan_produk}}</td>
                            <td>{{$data->qty}}
                                <button class="btn btn-sm border" style="border-radius:0.25rem; border:2px solid" data-toggle="modal" data-target="#ubahQty-{{$data->id}}">
                                    <i class="fa fa-edit p-0"></i>
                                </button>
                                <!-- MODALS -->
                                    <x-modal id="ubahQty-{{$data->id}}" title="Ubah Quantity">
                                        <form id="ubahQtyForm" action="{{ route('order.pending-dan-proses.update-qty', ['kode' => $data->id_pesanan, 'id' => $data->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <label for="exampleFormControlTextarea1">Quantity</label>
                                                <input type="number" class="form-control" name="qty">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>  
                                            </div>
                                        </form>
                                    </x-modal>
                                <!-- END MODALS -->
                            </td>
                            <td>{{ $data->harga_jual * $data->qty}}</td>
                            @php
                                $total += $data->harga_jual * $data->qty;
                                $kode = $data->kode;
                                $catatan = $data->catatan;
                            @endphp
                            <td class="text-center d-flex justify-content-center border-bottom-0">
                                <form action="{{ route('order.pending-dan-proses.delete-produk-dipesan', ['kode' => $data->id_pesanan, 'id' => $data->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-light mr-1 border" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="far fa-trash-alt" style="color: #000000;"></i></button>
                                </form>
                            </td>
                        </tr>
                        @php 
                            $counter++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="container text-dark">
                    <form action="{{ route('order.bayar-pesanan', ['kode' => $kode]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4 col-lg-6">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Metode Pembayaran</label>
                                            <select class="form-control" id="exampleFormControlSelect1"
                                                name="tipe_bayar">
                                                <option>Cash</option>
                                                <option>Invoice</option>
                                                <option>Debit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="border rounded" style="padding: 15px; max-width: 355px;">
                                        <h4><b>Catatan Pembeli</b></h4>
                                        <p>{{ $catatan }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%; border:none">Total:</th>
                                                <td style="border-top: none;border-bottom:1px solid #ddd"><span
                                                        class="text-dark">Rp </span><input id="total"
                                                        name="total" type="number" value="{{ $total }}"
                                                        style="border:none" style="width:150px" readonly></td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%; border:none">Diskon:</th>
                                                <td style="border-top: none;border-bottom:1px solid #ddd"><span
                                                        class="text-dark">Rp </span><input id="diskon"
                                                        name="diskon" type="number" style="width:150px"></td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%; border:none">Total Akhir:</th>
                                                <td style="border-top: none;border-bottom:1px solid #ddd"><span
                                                        class="text-dark">Rp </span><input id="total-akhir"
                                                        name="totalakhir" type="number" style="border:none"
                                                        style="width:150px" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a class="btn btn-default float-right mr-2 border text-dark"
                                    href="/order/invoice">Kembali</a>
                                <button class="btn btn-primary float-right mr-2 border text-white"
                                    type="submit">Bayar</a>
                            </div>
                        </div>
                    </form>
                    <div>
                    </div>
                </div>

                @push('scripts')
                    @include('order.pending-dan-proses.script')
                @endpush
</x-admin-layout>
