<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Permission;
use App\Models\Role;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class RoleHasPermission
 * 
 * @property int $permission_id
 * @property int $role_id
 * 
 * @property Permission $permission
 * @property Role $role
 *
 * @package App\Models\Base
 */
class RoleHasPermission extends BaseModel
{
	use FormatDates;
	const PERMISSION_ID = 'permission_id';
	const ROLE_ID = 'role_id';
	protected $connection = 'mysql';
	protected $table = 'role_has_permissions';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::PERMISSION_ID => 'int',
		self::ROLE_ID => 'int'
	];

	public function permission(): BelongsTo
	{
		return $this->belongsTo(Permission::class);
	}

	public function role(): BelongsTo
	{
		return $this->belongsTo(Role::class);
	}
}
