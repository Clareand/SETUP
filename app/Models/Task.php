<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ModuleList[] $module_lists
 * @property Collection|TaskField[] $task_fields
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Task extends Model
{
	protected $table = 'tasks';

	protected $fillable = [
		'name',
		'description'
	];

	public function module_lists()
	{
		return $this->hasMany(ModuleList::class, 'id_task');
	}

	public function task_fields()
	{
		return $this->hasMany(TaskField::class, 'id_task');
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_tasks', 'id_task', 'id_user')
					->withPivot('id', 'point')
					->withTimestamps();
	}
}
