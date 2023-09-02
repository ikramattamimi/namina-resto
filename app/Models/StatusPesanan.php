<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StatusPesanan
 * 
 * @property int $id
 * @property string|null $nama
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Pesanan[] $pesanans
 *
 * @package App\Models
 */
class StatusPesanan extends Model
{
	protected $table = 'status_pesanans';

	protected $fillable = [
		'nama'
	];

	public function pesanans()
	{
		return $this->hasMany(Pesanan::class);
	}
}
