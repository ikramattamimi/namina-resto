<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleUser
 * 
 * @property int $id
 * @property string|null $nama
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class RoleUser extends Model
{
	protected $table = 'role_users';

	protected $fillable = [
		'nama'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'role_id');
	}
}
