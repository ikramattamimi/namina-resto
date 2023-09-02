<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pesanan
 * 
 * @property int $id
 * @property int $status_pesanan_id
 * @property string|null $kode
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property StatusPesanan $status_pesanan
 * @property Collection|Pembayaran[] $pembayarans
 * @property Collection|ProdukDipesan[] $produk_dipesans
 *
 * @package App\Models
 */
class Pesanan extends Model
{
	protected $table = 'pesanans';

	protected $casts = [
		'status_pesanan_id' => 'int'
	];

	protected $fillable = [
		'status_pesanan_id',
		'kode'
	];

	public function status_pesanan()
	{
		return $this->belongsTo(StatusPesanan::class);
	}

	public function pembayarans()
	{
		return $this->hasMany(Pembayaran::class);
	}

	public function produk_dipesans()
	{
		return $this->hasMany(ProdukDipesan::class);
	}
}
