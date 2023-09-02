<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KategoriPembayaran
 * 
 * @property int $id
 * @property string|null $nama
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Pembayaran[] $pembayarans
 *
 * @package App\Models
 */
class KategoriPembayaran extends Model
{
	protected $table = 'kategori_pembayarans';

	protected $fillable = [
		'nama'
	];

	public function pembayarans()
	{
		return $this->hasMany(Pembayaran::class);
	}
}
