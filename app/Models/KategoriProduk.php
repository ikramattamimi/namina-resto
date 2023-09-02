<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KategoriProduk
 * 
 * @property int $id
 * @property int $dapur_id
 * @property string|null $nama
 * @property string|null $gambar
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property KategoriDapur $kategori_dapur
 * @property Collection|Produk[] $produks
 *
 * @package App\Models
 */
class KategoriProduk extends Model
{
	protected $table = 'kategori_produks';

	protected $casts = [
		'dapur_id' => 'int'
	];

	protected $fillable = [
		'dapur_id',
		'nama',
		'gambar'
	];

	public function kategori_dapur()
	{
		return $this->belongsTo(KategoriDapur::class, 'dapur_id');
	}

	public function produks()
	{
		return $this->hasMany(Produk::class);
	}
}
