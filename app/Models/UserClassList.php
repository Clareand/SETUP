<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserClassList
 * 
 * @property int $id
 * @property int $id_user
 * @property int $id_class
 * @property int $progress
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ClassList $class_list
 * @property User $user
 *
 * @package App\Models
 */
class UserClassList extends Model
{
	protected $table = 'user_class_lists';

	protected $casts = [
		'id_user' => 'int',
		'id_class' => 'int',
		'progress' => 'int'
	];

	protected $fillable = [
		'id_user',
		'id_class',
		'progress'
	];

	public function class_list()
	{
		return $this->belongsTo(ClassList::class, 'id_class');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}
