<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PembelianDetail
 * 
 * @property int $id
 * @property int $bahan_baku_id
 * @property int|null $jumlah
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property BahanBaku $bahan_baku
 *
 * @package App\Models
 */
class PembelianDetail extends Model
{
	protected $table = 'pembelian_detail';

	protected $casts = [
		'bahan_baku_id' => 'int',
        'pembelian_id' => 'int',
		'jumlah' => 'int',
	];

	protected $fillable = [
		'bahan_baku_id',
        'pembelian_id',
		'jumlah',
	];

	public function bahan_baku()
	{
		return $this->belongsTo(BahanBaku::class);
	}
}
