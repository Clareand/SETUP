<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserBadge
 * 
 * @property int $id
 * @property int $id_user
 * @property int $id_badge
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Badge $badge
 * @property User $user
 *
 * @package App\Models
 */
class UserBadge extends Model
{
	protected $table = 'user_badges';

	protected $casts = [
		'id_user' => 'int',
		'id_badge' => 'int'
	];

	protected $fillable = [
		'id_user',
		'id_badge'
	];

	public function badge()
	{
		return $this->belongsTo(Badge::class, 'id_badge');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}
