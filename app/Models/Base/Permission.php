<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ModelHasPermission;
use App\Models\Role;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Permission
 * 
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ModelHasPermission[] $model_has_permissions
 * @property Collection|Role[] $roles
 *
 * @package App\Models\Base
 */
class Permission extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const NAME = 'name';
	const GUARD_NAME = 'guard_name';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	protected $connection = 'mysql';
	protected $table = 'permissions';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function model_has_permissions(): HasMany
	{
		return $this->hasMany(ModelHasPermission::class);
	}

	public function roles(): BelongsToMany
	{
		return $this->belongsToMany(Role::class, 'role_has_permissions');
	}
}
