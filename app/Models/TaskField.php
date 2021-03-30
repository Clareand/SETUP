<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TaskField
 * 
 * @property int $id
 * @property int $id_task
 * @property string $field_question
 * @property string $field_type
 * @property int $point
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Task $task
 * @property Collection|TaskFieldOption[] $task_field_options
 * @property Collection|UserTaskAnswer[] $user_task_answers
 *
 * @package App\Models
 */
class TaskField extends Model
{
	protected $table = 'task_fields';

	protected $casts = [
		'id_task' => 'int',
		'point' => 'int'
	];

	protected $fillable = [
		'id_task',
		'field_question',
		'field_type',
		'point'
	];

	public function task()
	{
		return $this->belongsTo(Task::class, 'id_task');
	}

	public function task_field_options()
	{
		return $this->hasMany(TaskFieldOption::class, 'id_task_field');
	}

	public function user_task_answers()
	{
		return $this->hasMany(UserTaskAnswer::class, 'id_task_field');
	}
}
