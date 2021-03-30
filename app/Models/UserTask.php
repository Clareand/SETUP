<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserTask
 * 
 * @property int $id
 * @property int $id_user
 * @property int $id_task
 * @property int|null $point
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Task $task
 * @property User $user
 * @property Collection|UserTaskAnswer[] $user_task_answers
 *
 * @package App\Models
 */
class UserTask extends Model
{
	protected $table = 'user_tasks';

	protected $casts = [
		'id_user' => 'int',
		'id_task' => 'int',
		'point' => 'int'
	];

	protected $fillable = [
		'id_user',
		'id_task',
		'point'
	];

	public function task()
	{
		return $this->belongsTo(Task::class, 'id_task');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function user_task_answers()
	{
		return $this->hasMany(UserTaskAnswer::class, 'id_user_task');
	}
}
