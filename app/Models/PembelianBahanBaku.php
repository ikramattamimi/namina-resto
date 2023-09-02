<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PembelianBahanBaku
 * 
 * @property int $id
 * @property int $bahan_baku_id
 * @property int|null $jumlah
 * @property Carbon|null $tanggal
 * @property string|null $nama_staff_gudang
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property BahanBaku $bahan_baku
 *
 * @package App\Models
 */
class PembelianBahanBaku extends Model
{
	protected $table = 'pembelian_bahan_bakus';

	protected $casts = [
		'bahan_baku_id' => 'int',
		'jumlah' => 'int',
		'tanggal' => 'datetime'
	];

	protected $fillable = [
		'bahan_baku_id',
		'jumlah',
		'tanggal',
		'nama_staff_gudang'
	];

	public function bahan_baku()
	{
		return $this->belongsTo(BahanBaku::class);
	}
}
