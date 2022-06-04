<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Role;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ModelHasRole
 * 
 * @property int $role_id
 * @property string $model_type
 * @property int $model_id
 * 
 * @property Role $role
 *
 * @package App\Models\Base
 */
class ModelHasRole extends BaseModel
{
	use FormatDates;
	const ROLE_ID = 'role_id';
	const MODEL_TYPE = 'model_type';
	const MODEL_ID = 'model_id';
	protected $connection = 'mysql';
	protected $table = 'model_has_roles';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::ROLE_ID => 'int',
		self::MODEL_ID => 'int'
	];

	public function role(): BelongsTo
	{
		return $this->belongsTo(Role::class);
	}
}
