<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserTaskAnswer
 * 
 * @property int $id
 * @property int $id_user
 * @property int $id_user_task
 * @property int $id_task
 * @property int $id_task_field
 * @property string|null $answer_short
 * @property string|null $answer_multiple
 * @property string|null $answer_upload
 * @property int|null $point
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TaskField $task_field
 * @property Task $task
 * @property UserTask $user_task
 * @property User $user
 *
 * @package App\Models
 */
class UserTaskAnswer extends Model
{
	protected $table = 'user_task_answers';

	protected $casts = [
		'id_user' => 'int',
		'id_user_task' => 'int',
		'id_task' => 'int',
		'id_task_field' => 'int',
		'point' => 'int'
	];

	protected $fillable = [
		'id_user',
		'id_user_task',
		'id_task',
		'id_task_field',
		'answer_short',
		'answer_multiple',
		'answer_upload',
		'point'
	];

	public function task_field()
	{
		return $this->belongsTo(TaskField::class, 'id_task_field');
	}

	public function task()
	{
		return $this->belongsTo(Task::class, 'id_task');
	}

	public function user_task()
	{
		return $this->belongsTo(UserTask::class, 'id_user_task');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}
