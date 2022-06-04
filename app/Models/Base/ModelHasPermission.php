<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Permission;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ModelHasPermission
 * 
 * @property int $permission_id
 * @property string $model_type
 * @property int $model_id
 * 
 * @property Permission $permission
 *
 * @package App\Models\Base
 */
class ModelHasPermission extends BaseModel
{
	use FormatDates;
	const PERMISSION_ID = 'permission_id';
	const MODEL_TYPE = 'model_type';
	const MODEL_ID = 'model_id';
	protected $connection = 'mysql';
	protected $table = 'model_has_permissions';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::PERMISSION_ID => 'int',
		self::MODEL_ID => 'int'
	];

	public function permission(): BelongsTo
	{
		return $this->belongsTo(Permission::class);
	}
}
