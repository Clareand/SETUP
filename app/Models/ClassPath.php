<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClassPath
 * 
 * @property int $id
 * @property int $id_class
 * @property int $id_learning_path
 * @property int $step
 * 
 * @property ClassList $class_list
 * @property LearningPath $learning_path
 *
 * @package App\Models
 */
class ClassPath extends Model
{
	protected $table = 'class_path';
	public $timestamps = false;

	protected $casts = [
		'id_class' => 'int',
		'id_learning_path' => 'int',
		'step' => 'int'
	];

	protected $fillable = [
		'id_class',
		'id_learning_path',
		'step'
	];

	public function class_list()
	{
		return $this->belongsTo(ClassList::class, 'id_class');
	}

	public function learning_path()
	{
		return $this->belongsTo(LearningPath::class, 'id_learning_path');
	}
}
