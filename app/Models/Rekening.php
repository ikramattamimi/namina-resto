<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rekening
 * 
 * @property int $id
 * @property string|null $nama
 * @property string|null $nomor
 * @property float|null $saldo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Rekening extends Model
{
	protected $table = 'rekenings';

	protected $casts = [
		'saldo' => 'float'
	];

	protected $fillable = [
		'nama',
		'nomor',
		'saldo'
	];
}
