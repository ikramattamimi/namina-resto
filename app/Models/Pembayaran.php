<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pembayaran
 * 
 * @property int $id
 * @property int $pesanan_id
 * @property int $kategori_pembayaran_id
 * @property int $user_id
 * @property Carbon|null $tanggal
 * @property float|null $jumlah
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Pesanan $pesanan
 * @property User $user
 * @property KategoriPembayaran $kategori_pembayaran
 *
 * @package App\Models
 */
class Pembayaran extends Model
{
	protected $table = 'pembayarans';

	protected $casts = [
		'pesanan_id' => 'int',
		'kategori_pembayaran_id' => 'int',
		'user_id' => 'int',
		'tanggal' => 'datetime',
		'jumlah' => 'float'
	];

	protected $fillable = [
		'pesanan_id',
		'kategori_pembayaran_id',
		'user_id',
		'tanggal',
		'jumlah'
	];

	public function pesanan()
	{
		return $this->belongsTo(Pesanan::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function kategori_pembayaran()
	{
		return $this->belongsTo(KategoriPembayaran::class);
	}
}
