<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property int $id_role
 * @property int $is_deleted
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Role $role
 * @property Collection|Admin[] $admins
 * @property Collection|Student[] $students
 * @property Collection|Badge[] $badges
 * @property Collection|ClassList[] $class_lists
 * @property Collection|UserModule[] $user_modules
 * @property Collection|Task[] $tasks
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'id_role' => 'int',
		'is_deleted' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'email',
		'phone',
		'password',
		'id_role',
		'is_deleted'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'id_role');
	}

	public function admins()
	{
		return $this->hasMany(Admin::class, 'id_user');
	}

	public function students()
	{
		return $this->hasMany(Student::class, 'id_user');
	}

	public function badges()
	{
		return $this->belongsToMany(Badge::class, 'user_badges', 'id_user', 'id_badge')
					->withPivot('id')
					->withTimestamps();
	}

	public function class_lists()
	{
		return $this->belongsToMany(ClassList::class, 'user_class_lists', 'id_user', 'id_class')
					->withPivot('id', 'progress')
					->withTimestamps();
	}

	public function user_modules()
	{
		return $this->hasMany(UserModule::class, 'id_user');
	}

	public function tasks()
	{
		return $this->belongsToMany(Task::class, 'user_tasks', 'id_user', 'id_task')
					->withPivot('id', 'point')
					->withTimestamps();
	}
}
