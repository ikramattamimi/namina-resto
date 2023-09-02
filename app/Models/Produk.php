<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produk
 * 
 * @property int $id
 * @property int|null $kategori_produk_id
 * @property string|null $kode
 * @property string|null $nama
 * @property int|null $stok
 * @property float|null $harga_jual
 * @property string|null $gambar
 * @property bool|null $is_active
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property KategoriProduk|null $kategori_produk
 * @property Collection|ProdukDipesan[] $produk_dipesans
 *
 * @package App\Models
 */
class Produk extends Model
{
	use SoftDeletes;
	protected $table = 'produks';

	protected $casts = [
		'kategori_produk_id' => 'int',
		'stok' => 'int',
		'harga_jual' => 'float',
		'is_active' => 'bool'
	];

	protected $fillable = [
		'kategori_produk_id',
		'kode',
		'nama',
		'stok',
		'harga_jual',
		'gambar',
		'is_active'
	];

	public function kategori_produk()
	{
		return $this->belongsTo(KategoriProduk::class);
	}

	public function produk_dipesans()
	{
		return $this->hasMany(ProdukDipesan::class);
	}
}
