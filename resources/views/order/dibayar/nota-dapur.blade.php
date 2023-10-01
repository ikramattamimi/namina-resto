<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        .container {
            width: 300px;
            margin: 0 auto; /* Untuk mengatur tengah secara horizontal */
            text-align: center; /* Untuk mengatur tengah secara horizontal */
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        h2, p {
            margin: 0;
        }
        .flex-container-1 {
            display: flex;
            margin-top: 10px;
        }

        .flex-container-1 > div {
            text-align : left;
        }
        .flex-container-1 .right {
            text-align : right;
            width: 200px;
        }
        .flex-container-1 .left {
            width: 100px;
        }
        .flex-container {
            width: 300px;
            display: flex;
        }

        .flex-container > div {
            -ms-flex: 1;  /* IE 10 */
            flex: 1;
        }
        ul {
            display: contents;
        }
        ul li {
            display: block;
        }
        hr {
            border-style: dashed;
        }
        a {
            text-decoration: none;
            text-align: center;
            padding: 10px;
            background: #00e676;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Namina Resto & Private Resto</h2>
            <p><small>Jl. Raya Garut - Cikajang No.km 14, Sirnagalih, Cisurupan, Kabupaten Garut, Jawa Barat 44163</small></p>
            <p><small>Telp 0262 2543686 / WA 081220088980</small></p>
            <p><small>Email: naminaprivateresto@gmail.com</small></p>
        </div>
        <hr>
        @if(isset($order[0]))
        <div class="flex-container-1">
            <div class="left">
                <ul>
                    <li>No. Order</li>
                    <li>Tanggal Pesanan</li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li> {{ $order[0]->kode }} </li>
                    <li> {{ date('Y-m-d : H:i:s', strtotime($order[0]->created_at)) }} </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="flex-container-1">
            <div class="left">
                <ul>
                    <li>No. Meja</li>
                    <li>Nama Pembeli</li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li> {{ $order[0]->no_meja }} </li>
                    <li> {{ $order[0]->nama }} </li>
                </ul>
            </div>
        </div>
        @endif
        <hr>
        <p><strong>=========DAPUR UTAMA=========</strong></p>
		<div style="text-align:left">
		<ol>
			@foreach($dapur_utama as $item)
			<li>
				<p><strong>{{$item->nama}}</strong></p>
				<p>- Jumlah: {{ $item->qty }} porsi</p>
				<p>- Catatan: {{ $item->catatan }}</p>
			</li>
			@endforeach
		</ol>
		</div>
        <hr>
		@if(isset($order[0]))
        <div class="flex-container-1">
            <div class="left">
                <ul>
                    <li>No. Order</li>
                    <li>Tanggal Pesanan</li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li> {{ $order[0]->kode }} </li>
                    <li> {{ date('Y-m-d : H:i:s', strtotime($order[0]->created_at)) }} </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="flex-container-1">
            <div class="left">
                <ul>
                    <li>No. Meja</li>
                    <li>Nama Pembeli</li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li> {{ $order[0]->no_meja }} </li>
                    <li> {{ $order[0]->nama }} </li>
                </ul>
            </div>
        </div>
        @endif
        <hr>
		<p><strong>========DAPUR CEMILAN========</strong></p>
			<div style="text-align:left">
		<ol>
			@foreach($dapur_cemilan as $item)
			<li>
				<p><strong>{{$item->nama}}</strong></p>
				<p>- Jumlah: {{ $item->qty }} porsi</p>
				<p>- Catatan: {{ $item->catatan }}</p>
			</li>
			@endforeach
		</ol>
		</div>
        <hr>
        @if(isset($order[0]))
        <div class="flex-container-1">
            <div class="left">
                <ul>
                    <li>No. Order</li>
                    <li>Tanggal Pesanan</li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li> {{ $order[0]->kode }} </li>
                    <li> {{ date('Y-m-d : H:i:s', strtotime($order[0]->created_at)) }} </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="flex-container-1">
            <div class="left">
                <ul>
                    <li>No. Meja</li>
                    <li>Nama Pembeli</li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li> {{ $order[0]->no_meja }} </li>
                    <li> {{ $order[0]->nama }} </li>
                </ul>
            </div>
        </div>
        @endif
        <hr>
		<p><strong>=============BAR=============</strong></p>
			<div style="text-align:left">
		<ol>
			@foreach($bar as $item)
			<li>
				<p><strong>{{$item->nama}}</strong></p>
				<p>- Jumlah: {{ $item->qty }} porsi</p>
				<p>- Catatan: {{ $item->catatan }}</p>
			</li>
			@endforeach
		</ol>
		</div>
        <hr>
    </div>
</body>
</html>