<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PengeluaranRestoran
 * 
 * @property int $id
 * @property string|null $nama
 * @property Carbon|null $tanggal
 * @property float|null $jumlah
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class PengeluaranRestoran extends Model
{
	protected $table = 'pengeluaran_restorans';

	protected $casts = [
		'tanggal' => 'datetime',
		'jumlah' => 'float'
	];

	protected $fillable = [
		'nama',
		'tanggal',
		'jumlah'
	];
}
