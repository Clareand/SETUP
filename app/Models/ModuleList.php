<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModuleList
 * 
 * @property int $id
 * @property int $id_class
 * @property int|null $id_task
 * @property int|null $id_material
 * @property string $type
 * @property int $step
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ClassList $class_list
 * @property Material|null $material
 * @property Task|null $task
 * @property Collection|UserModule[] $user_modules
 *
 * @package App\Models
 */
class ModuleList extends Model
{
	protected $table = 'module_lists';

	protected $casts = [
		'id_class' => 'int',
		'id_task' => 'int',
		'id_material' => 'int',
		'step' => 'int'
	];

	protected $fillable = [
		'id_class',
		'id_task',
		'id_material',
		'type',
		'step'
	];

	public function class_list()
	{
		return $this->belongsTo(ClassList::class, 'id_class');
	}

	public function material()
	{
		return $this->belongsTo(Material::class, 'id_material');
	}

	public function task()
	{
		return $this->belongsTo(Task::class, 'id_task');
	}

	public function user_modules()
	{
		return $this->hasMany(UserModule::class, 'id_module');
	}
}
