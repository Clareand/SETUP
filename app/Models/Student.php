<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * 
 * @property int $id
 * @property int $id_user
 * @property int $id_role
 * @property string $last_name
 * @property string|null $address
 * @property string|null $city
 * @property string|null $postal_code
 * @property int|null $point
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Regency|null $regency
 * @property Role $role
 * @property User $user
 *
 * @package App\Models
 */
class Student extends Model
{
	protected $table = 'students';

	protected $casts = [
		'id_user' => 'int',
		'id_role' => 'int',
		'point' => 'int'
	];

	protected $fillable = [
		'id_user',
		'id_role',
		'last_name',
		'address',
		'city',
		'postal_code',
		'point'
	];

	public function regency()
	{
		return $this->belongsTo(Regency::class, 'city');
	}

	public function role()
	{
		return $this->belongsTo(Role::class, 'id_role');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}
