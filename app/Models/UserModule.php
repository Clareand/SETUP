<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserModule
 * 
 * @property int $id
 * @property int $id_user
 * @property int $id_module
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ModuleList $module_list
 * @property User $user
 *
 * @package App\Models
 */
class UserModule extends Model
{
	protected $table = 'user_modules';

	protected $casts = [
		'id_user' => 'int',
		'id_module' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'id_user',
		'id_module',
		'status'
	];

	public function module_list()
	{
		return $this->belongsTo(ModuleList::class, 'id_module');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}
