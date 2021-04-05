<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Admin
 * 
 * @property int $id
 * @property int $id_user
 * @property int $id_role
 * @property string|null $address
 * @property string|null $city
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Role $role
 * @property User $user
 * @property Regency|null $regency
 *
 * @package App\Models
 */
class Admin extends Model
{
	protected $table = 'admins';

	protected $casts = [
		'id_user' => 'int',
		'id_role' => 'int'
	];

	protected $fillable = [
		'id_user',
		'id_role',
		'address',
		'city'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'id_user');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function regency()
	{
		return $this->belongsTo(Regency::class, 'city');
	}
}
