<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Project;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectProfile
 * 
 * @property int $id
 * @property string $u_id
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Project[] $projects
 *
 * @package App\Models\Base
 */
class ProjectProfile extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const DESCRIPTION = 'description';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	protected $connection = 'mysql';
	protected $table = 'project_profiles';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function projects(): HasMany
	{
		return $this->hasMany(Project::class, Project::PROJECT_PROFILE_U_ID, Project::U_ID);
	}
}
