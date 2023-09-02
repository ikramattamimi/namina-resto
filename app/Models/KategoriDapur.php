<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KategoriDapur
 * 
 * @property int $id
 * @property string|null $nama
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|KategoriProduk[] $kategori_produks
 *
 * @package App\Models
 */
class KategoriDapur extends Model
{
	protected $table = 'kategori_dapurs';

	protected $fillable = [
		'nama'
	];

	public function kategori_produks()
	{
		return $this->hasMany(KategoriProduk::class, 'dapur_id');
	}
}
