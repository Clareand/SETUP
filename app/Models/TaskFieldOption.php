<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TaskFieldOption
 * 
 * @property int $id
 * @property int $id_task_field
 * @property string $option_value
 * @property string|null $option_text
 * @property string|null $option_image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TaskField $task_field
 *
 * @package App\Models
 */
class TaskFieldOption extends Model
{
	protected $table = 'task_field_options';

	protected $casts = [
		'id_task_field' => 'int'
	];

	protected $fillable = [
		'id_task_field',
		'option_value',
		'option_text',
		'option_image'
	];

	public function task_field()
	{
		return $this->belongsTo(TaskField::class, 'id_task_field');
	}
}
