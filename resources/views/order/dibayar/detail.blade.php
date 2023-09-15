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
                        <div class="col">
                            <h5>
                                <i class="fas fa-globe fa-lg" style="color: #000000;"></i>
                                No. Antrian: 19
                            </h5>
                        </div>
                        <div class="col">
                            <div class="text-right">
                                <h5>Tanggal: 04 Mei 2023 10:11:12 am</h5>
                            </div>
                        </div>
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
                        <div class="col-sm">
                            <p class="mb-0">Pembeli</p>
                            <p class="mb-0 font-weight-bold">Miss Rina</p>
                            <p class="mb-0">Alamat</p>
                            <p class="mb-0">Tlpn/Wa: 0812321321</p>
                            <p class="mb-0"><span class="font-weight-bold">Orderan:</span> Meja No.1</p>
                        </div>
                        <div class="col-sm">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="font-weight-bold">
                                        Status Orderan
                                    </div>
                                    <p>-</p>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ubahAlamatModals">Ganti Alamat <i class="fas fa-edit fa-sm"></i></button>  
                                </div>

                                <!-- MODALS -->
                                <x-modal id="ubahAlamatModals" title="Ganti Alamat">
                                    <form action="">
                                        <label for="exampleFormControlTextarea1">Detail Alamat Pengiriman</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </form>    
                                </x-modal>
                                <!-- END MODALS -->
                                <div class="col-sm">
                                    <div class="font-weight-bold">
                                        Status Dapur
                                    </div>
                                    <p>-</p>  
                                </div>
                            </div>
                        </div>
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
                        <tr class="mb-3">
                            <td>1</td>
                            <td>12342</td>
                            <td>PISANG GORENG</td>
                            <td>20000</td>
                            <td>Setengah mateng</td>
                            <td>5</td>
                            <td>10000</td>
                            <td>10000</td>
                            <td class="text-center d-flex justify-content-center border-bottom-0">
                                <button type="button" class="btn btn-light mr-1 border"><i class="far fa-trash-alt" style="color: #000000;"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div class="container text-dark">
                    <div class="row">
                        <div class="col-md-4 col-lg-6">
                            <div class="row">
                                <div class="col-9">
                                    <div class="form-group">
                                        <label for="kategori_status">Metode Pembayaran </label>
                                        <input type="text" name="namaUser" class="form-control" value="Cash" readonly="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group" style="margin-top:32px">
                                        <button class="btn btn-default border">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <div class="form-group">
                                        <label for="kategori_status">Tipe Order </label>
                                        <input type="text" name="namaUser" class="form-control" value="Cash" readonly="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group" style="margin-top:32px">
                                        <button class="btn btn-default border">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="border rounded" style="padding: 15px; max-width: 355px;">
                                <h4><b>Catatan Pembeli</b></h4>
                                <p>Tidak Ada Pembeli</p>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th style="width:50%; border:none">Total:</th>
                                            <td style="border-top: none;border-bottom:1px solid #ddd">Rp. 23.400</td>
                                        </tr>
                                        <tr>
                                            <th style="border:none">Biaya Ongkir:</th>
                                            <td style="border-top: none;border-bottom:1px solid #ddd">Rp. 23.400</td>
                                        </tr>
                                        <tr>
                                            <th style="border:none">Total Semua:</th>
                                            <td style="border-top: none;border-bottom:1px solid #ddd">Rp. 23.400</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="/order/dibayar" class="btn btn-default float-right mr-2 border text-dark">Kembali</a>
                        </div>
                    </div>
            <div>
        </div>
    </div>
</x-admin-layout>