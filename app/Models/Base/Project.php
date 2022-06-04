<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CheckIn;
use App\Models\Order;
use App\Models\ProjectProfile;
use App\Models\ProjectServiceTagJoint;
use App\Models\ProjectTask;
use App\Models\ProjectsClient;
use App\Models\ServiceNotification;
use App\Models\ServiceTag;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
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
 * @property float $location_lat
 * @property float $location_long
 * @property float $expected_service_radius
 * 
 * @property ProjectProfile $project_profile
 * @property Collection|CheckIn[] $check_ins
 * @property Collection|Order[] $orders
 * @property Collection|ServiceTag[] $service_tags
 * @property Collection|ProjectTask[] $project_tasks
 * @property Collection|ProjectsClient[] $projects_clients
 * @property Collection|ServiceNotification[] $service_notifications
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
	const LOCATION_LAT = 'location_lat';
	const LOCATION_LONG = 'location_long';
	const EXPECTED_SERVICE_RADIUS = 'expected_service_radius';
	protected $connection = 'mysql';
	protected $table = 'projects';

	protected $casts = [
		self::ID => 'int',
		self::BUDGET => 'float',
		self::DURATION => 'int',
		self::LOCATION_LAT => 'float',
		self::LOCATION_LONG => 'float',
		self::EXPECTED_SERVICE_RADIUS => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function project_profile(): BelongsTo
	{
		return $this->belongsTo(ProjectProfile::class, \App\Models\Project::PROJECT_PROFILE_U_ID, ProjectProfile::U_ID);
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

	public function service_notifications(): HasMany
	{
		return $this->hasMany(ServiceNotification::class, ServiceNotification::PROJECT_U_ID, ServiceNotification::U_ID);
	}
}
