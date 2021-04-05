<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $role_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Admin[] $admins
 * @property Collection|Student[] $students
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';

	protected $fillable = [
		'role_name'
	];

	public function admins()
	{
		return $this->hasMany(Admin::class, 'id_user');
	}

	public function students()
	{
		return $this->hasMany(Student::class, 'id_role');
	}

	public function users()
	{
		return $this->hasMany(User::class, 'id_role');
	}
}
