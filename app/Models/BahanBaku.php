<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BahanBaku
 * 
 * @property int $id
 * @property string|null $nama
 * @property string|null $deskripsi
 * @property float|null $harga_beli
 * @property int|null $stok
 * @property int|null $minimal_stok
 * @property string|null $satuan
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|PembelianBahanBaku[] $pembelian_bahan_bakus
 * @property Collection|PenguranganBahanBaku[] $pengurangan_bahan_bakus
 *
 * @package App\Models
 */
class BahanBaku extends Model
{
	protected $table = 'bahan_bakus';

	protected $casts = [
		'harga_beli' => 'float',
		'stok' => 'int',
		'minimal_stok' => 'int'
	];

	protected $fillable = [
		'nama',
		'deskripsi',
		'harga_beli',
		'stok',
		'minimal_stok',
		'satuan'
	];

	public function pembelian_bahan_bakus()
	{
		return $this->hasMany(PembelianBahanBaku::class);
	}

	public function pengurangan_bahan_bakus()
	{
		return $this->hasMany(PenguranganBahanBaku::class);
	}
}
