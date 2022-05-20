<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\Chat;
use App\Models\CheckinUser;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\ProjectTaskGroup;
use App\Models\ServiceTag;
use App\Models\ServiceTagCheckIn;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CheckIn
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $project_u_id
 * @property string|null $checkin_description
 * @property string|null $project_task_group_u_id
 * @property int|null $estimated_completion_coverage_percentage
 * @property float|null $estimated_completion_cost
 * @property int|null $estimated_completion_time
 * @property string|null $estimated_completion_time_type
 * 
 * @property Project $project
 * @property ProjectTaskGroup|null $project_task_group
 * @property Collection|Chat[] $chats
 * @property Collection|CheckinUser[] $checkin_users
 * @property Collection|ProjectTask[] $project_tasks
 * @property Collection|ServiceTag[] $service_tags
 *
 * @package App\Models\Base
 */
class CheckIn extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const PROJECT_U_ID = 'project_u_id';
	const CHECKIN_DESCRIPTION = 'checkin_description';
	const PROJECT_TASK_GROUP_U_ID = 'project_task_group_u_id';
	const ESTIMATED_COMPLETION_COVERAGE_PERCENTAGE = 'estimated_completion_coverage_percentage';
	const ESTIMATED_COMPLETION_COST = 'estimated_completion_cost';
	const ESTIMATED_COMPLETION_TIME = 'estimated_completion_time';
	const ESTIMATED_COMPLETION_TIME_TYPE = 'estimated_completion_time_type';
	protected $connection = 'mysql';
	protected $table = 'check_in';

	protected $casts = [
		self::ID => 'int',
		self::ESTIMATED_COMPLETION_COVERAGE_PERCENTAGE => 'int',
		self::ESTIMATED_COMPLETION_COST => 'float',
		self::ESTIMATED_COMPLETION_TIME => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function project(): BelongsTo
	{
		return $this->belongsTo(Project::class, \App\Models\CheckIn::PROJECT_U_ID, Project::U_ID);
	}

	public function project_task_group(): BelongsTo
	{
		return $this->belongsTo(ProjectTaskGroup::class, \App\Models\CheckIn::PROJECT_TASK_GROUP_U_ID, ProjectTaskGroup::U_ID);
	}

	public function chats(): HasMany
	{
		return $this->hasMany(Chat::class, Chat::CHECK_IN_U_ID, Chat::U_ID);
	}

	public function checkin_users(): HasMany
	{
		return $this->hasMany(CheckinUser::class, CheckinUser::CHECK_IN_U_ID, CheckinUser::U_ID);
	}

	public function project_tasks(): HasMany
	{
		return $this->hasMany(ProjectTask::class, ProjectTask::CHECK_IN_U_ID, ProjectTask::U_ID);
	}

	public function service_tags(): BelongsToMany
	{
		return $this->belongsToMany(ServiceTag::class, 'service_tag_check_in', ServiceTag::CHECK_IN_U_ID, ServiceTag::SERVICE_TAG_U_ID)
					->withPivot(ServiceTagCheckIn::ID, ServiceTagCheckIn::U_ID, ServiceTagCheckIn::DELETED_AT)
					->withTimestamps();
	}
}
