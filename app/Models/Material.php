<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Material
 * 
 * @property int $id
 * @property string $title
 * @property string $material_text
 * @property string|null $material_image
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ModuleList[] $module_lists
 *
 * @package App\Models
 */
class Material extends Model
{
	protected $table = 'materials';

	protected $fillable = [
		'title',
		'material_text',
		'material_image',
		'point'
	];

	public function module_lists()
	{
		return $this->hasMany(ModuleList::class, 'id_material');
	}
}
