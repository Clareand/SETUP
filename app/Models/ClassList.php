<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClassList
 * 
 * @property int $id
 * @property string $name
 * @property int|null $field_of_tech
 * @property int|null $all_module
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TechField|null $tech_field
 * @property Collection|ClassPath[] $class_paths
 * @property Collection|ModuleList[] $module_lists
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class ClassList extends Model
{
	protected $table = 'class_lists';

	protected $casts = [
		'field_of_tech' => 'int',
		'all_module' => 'int'
	];

	protected $fillable = [
		'name',
		'field_of_tech',
		'all_module',
		'description'
	];

	public function tech_field()
	{
		return $this->belongsTo(TechField::class, 'field_of_tech');
	}

	public function class_paths()
	{
		return $this->hasMany(ClassPath::class, 'id_class');
	}

	public function module_lists()
	{
		return $this->hasMany(ModuleList::class, 'id_class');
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_class_lists', 'id_class', 'id_user')
					->withPivot('id', 'progress')
					->withTimestamps();
	}
}
