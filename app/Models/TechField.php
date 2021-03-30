<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TechField
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ClassList[] $class_lists
 * @property Collection|LearningPath[] $learning_paths
 *
 * @package App\Models
 */
class TechField extends Model
{
	protected $table = 'tech_fields';

	protected $fillable = [
		'name'
	];

	public function class_lists()
	{
		return $this->hasMany(ClassList::class, 'field_of_tech');
	}

	public function learning_paths()
	{
		return $this->hasMany(LearningPath::class, 'id_field_of_tech');
	}
}
