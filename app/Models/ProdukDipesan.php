<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProdukDipesan
 * 
 * @property int $pesanan_id
 * @property int $produk_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Pesanan $pesanan
 * @property Produk $produk
 *
 * @package App\Models
 */
class ProdukDipesan extends Model
{
	protected $table = 'produk_dipesan';
	public $incrementing = false;

	protected $casts = [
		'pesanan_id' => 'int',
		'produk_id' => 'int'
	];

	public function pesanan()
	{
		return $this->belongsTo(Pesanan::class);
	}

	public function produk()
	{
		return $this->belongsTo(Produk::class);
	}
}
