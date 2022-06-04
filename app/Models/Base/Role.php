<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ModelHasRole;
use App\Models\Permission;
use App\Models\User;
use App\Models\UserRole;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ModelHasRole[] $model_has_roles
 * @property Collection|Permission[] $permissions
 * @property Collection|User[] $users
 *
 * @package App\Models\Base
 */
class Role extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const NAME = 'name';
	const GUARD_NAME = 'guard_name';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	protected $connection = 'mysql';
	protected $table = 'roles';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function model_has_roles(): HasMany
	{
		return $this->hasMany(ModelHasRole::class);
	}

	public function permissions(): BelongsToMany
	{
		return $this->belongsToMany(Permission::class, 'role_has_permissions');
	}

	public function users(): BelongsToMany
	{
		return $this->belongsToMany(User::class, 'user_roles', User::ROLE_ID, User::USER_U_ID)
					->withPivot(UserRole::ID);
	}
}
