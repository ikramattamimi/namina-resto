<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pelanggan
 * 
 * @property int $id
 * @property string|null $nama
 * @property string|null $no_hp
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Pelanggan extends Model
{
	use HasFactory;

	protected $table = 'pelanggans';

	protected $fillable = [
		'nama',
		'no_hp',
		'alamat'
	];

	public function idnya()
	{
		return $this->idg;
	}

	public function pesanans()
	{
		return $this->hasMany(Pesanan::class);
	}
}
