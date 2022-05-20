<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\CheckIn;
use App\Models\Location;
use App\Models\Order;
use App\Models\ProjectProfile;
use App\Models\ProjectServiceTagJoint;
use App\Models\ProjectTask;
use App\Models\ProjectsClient;
use App\Models\ServiceTag;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 * 
 * @property int $id
 * @property string $u_id
 * @property string $name
 * @property string $description
 * @property string $budget_type
 * @property float $budget
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $project_profile_u_id
 * @property string $type
 * @property string $status
 * @property int|null $duration
 * @property string|null $duration_type
 * @property int|null $locationsId
 * 
 * @property ProjectProfile $project_profile
 * @property Location|null $locations_id
 * @property Collection|CheckIn[] $check_ins
 * @property Collection|Order[] $orders
 * @property Collection|ServiceTag[] $service_tags
 * @property Collection|ProjectTask[] $project_tasks
 * @property Collection|ProjectsClient[] $projects_clients
 *
 * @package App\Models\Base
 */
class Project extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const NAME = 'name';
	const DESCRIPTION = 'description';
	const BUDGET_TYPE = 'budget_type';
	const BUDGET = 'budget';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const PROJECT_PROFILE_U_ID = 'project_profile_u_id';
	const TYPE = 'type';
	const STATUS = 'status';
	const DURATION = 'duration';
	const DURATION_TYPE = 'duration_type';
	const LOCATIONS_ID = 'locationsId';
	protected $connection = 'mysql';
	protected $table = 'projects';

	protected $casts = [
		self::ID => 'int',
		self::BUDGET => 'float',
		self::DURATION => 'int',
		self::LOCATIONSID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function project_profile(): BelongsTo
	{
		return $this->belongsTo(ProjectProfile::class, \App\Models\Project::PROJECT_PROFILE_U_ID, ProjectProfile::U_ID);
	}

	public function locations_id(): BelongsTo
	{
		return $this->belongsTo(Location::class, \App\Models\Project::LOCATIONSID);
	}

	public function check_ins(): HasMany
	{
		return $this->hasMany(CheckIn::class, CheckIn::PROJECT_U_ID, CheckIn::U_ID);
	}

	public function orders(): HasMany
	{
		return $this->hasMany(Order::class, Order::PROJECT_U_ID, Order::U_ID);
	}

	public function service_tags(): BelongsToMany
	{
		return $this->belongsToMany(ServiceTag::class, 'project_service_tag_joint', ServiceTag::PROJECT_U_ID, ServiceTag::TAG_U_ID)
					->withPivot(ProjectServiceTagJoint::ID, ProjectServiceTagJoint::DESCRIPTION, ProjectServiceTagJoint::DELETED_AT)
					->withTimestamps();
	}

	public function project_tasks(): HasMany
	{
		return $this->hasMany(ProjectTask::class, ProjectTask::PROJECT_U_ID, ProjectTask::U_ID);
	}

	public function projects_clients(): HasMany
	{
		return $this->hasMany(ProjectsClient::class, ProjectsClient::PROJECT_U_ID, ProjectsClient::U_ID);
	}
}
