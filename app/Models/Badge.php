<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Badge
 * 
 * @property int $id
 * @property string $name
 * @property string $image
 * @property int $point
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Badge extends Model
{
	protected $table = 'badges';

	protected $casts = [
		'point' => 'int'
	];

	protected $fillable = [
		'name',
		'image',
		'point'
	];

	public function users()
	{
		return $this->belongsToMany(User::class, 'user_badges', 'id_badge', 'id_user')
					->withPivot('id')
					->withTimestamps();
	}
}
