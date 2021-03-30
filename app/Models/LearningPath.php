<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LearningPath
 * 
 * @property int $id
 * @property int|null $id_badge
 * @property int|null $id_field_of_tech
 * @property string $name
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TechField|null $tech_field
 * @property Collection|ClassList[] $class_lists
 *
 * @package App\Models
 */
class LearningPath extends Model
{
	protected $table = 'learning_paths';

	protected $casts = [
		'id_badge' => 'int',
		'id_field_of_tech' => 'int'
	];

	protected $fillable = [
		'id_badge',
		'id_field_of_tech',
		'name',
		'description'
	];

	public function tech_field()
	{
		return $this->belongsTo(TechField::class, 'id_field_of_tech');
	}

	public function class_lists()
	{
		return $this->hasMany(ClassList::class, 'id_learning_path');
	}
}
