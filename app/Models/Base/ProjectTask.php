<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\CheckIn;
use App\Models\CheckinUser;
use App\Models\Project;
use App\Models\ProjectDataType;
use App\Models\ProjectStatusLabel;
use App\Models\ProjectTaskGroup;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectTask
 * 
 * @property int $id
 * @property string $u_id
 * @property string|null $check_in_u_id
 * @property string|null $check_out_u_id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $project_u_id
 * @property string|null $project_task_group_u_id
 * @property string|null $project_task_u_id
 * @property Carbon|null $timeline_start
 * @property Carbon|null $timeline_end
 * @property string $status_label
 * @property int $project_status_labelsId
 * @property string $user_u_id
 * @property string $user_type
 * @property string $user_status
 * @property Carbon|null $estimated_time_start
 * @property Carbon|null $estimated_time_end
 * @property bool $completed
 * 
 * @property CheckIn|null $check_in
 * @property CheckinUser|null $check_out
 * @property ProjectTaskGroup|null $project_task_group
 * @property Project|null $project
 * @property ProjectTask|null $project_task
 * @property ProjectStatusLabel $project_status_labels_id
 * @property Collection|ProjectDataType[] $project_data_types_where_project_tasks_id
 * @property Collection|ProjectTask[] $project_tasks
 *
 * @package App\Models\Base
 */
class ProjectTask extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CHECK_IN_U_ID = 'check_in_u_id';
	const CHECK_OUT_U_ID = 'check_out_u_id';
	const NAME = 'name';
	const DESCRIPTION = 'description';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const PROJECT_U_ID = 'project_u_id';
	const PROJECT_TASK_GROUP_U_ID = 'project_task_group_u_id';
	const PROJECT_TASK_U_ID = 'project_task_u_id';
	const TIMELINE_START = 'timeline_start';
	const TIMELINE_END = 'timeline_end';
	const STATUS_LABEL = 'status_label';
	const PROJECT_STATUS_LABELS_ID = 'project_status_labelsId';
	const USER_U_ID = 'user_u_id';
	const USER_TYPE = 'user_type';
	const USER_STATUS = 'user_status';
	const ESTIMATED_TIME_START = 'estimated_time_start';
	const ESTIMATED_TIME_END = 'estimated_time_end';
	const COMPLETED = 'completed';
	protected $connection = 'mysql';
	protected $table = 'project_tasks';

	protected $casts = [
		self::ID => 'int',
		self::PROJECT_STATUS_LABELSID => 'int',
		self::COMPLETED => 'bool'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT,
		self::TIMELINE_START,
		self::TIMELINE_END,
		self::ESTIMATED_TIME_START,
		self::ESTIMATED_TIME_END
	];

	public function check_in(): BelongsTo
	{
		return $this->belongsTo(CheckIn::class, ProjectTask::CHECK_IN_U_ID, CheckIn::U_ID);
	}

	public function check_out(): BelongsTo
	{
		return $this->belongsTo(CheckinUser::class, ProjectTask::CHECK_OUT_U_ID, CheckinUser::U_ID);
	}

	public function project_task_group(): BelongsTo
	{
		return $this->belongsTo(ProjectTaskGroup::class, ProjectTask::PROJECT_TASK_GROUP_U_ID, ProjectTaskGroup::U_ID);
	}

	public function project(): BelongsTo
	{
		return $this->belongsTo(Project::class, ProjectTask::PROJECT_U_ID, Project::U_ID);
	}

	public function project_task(): BelongsTo
	{
		return $this->belongsTo(ProjectTask::class, ProjectTask::PROJECT_TASK_U_ID, ProjectTask::U_ID);
	}

	public function project_status_labels_id(): BelongsTo
	{
		return $this->belongsTo(ProjectStatusLabel::class, ProjectTask::PROJECT_STATUS_LABELSID);
	}

	public function project_data_types_where_project_tasks_id(): HasMany
	{
		return $this->hasMany(ProjectDataType::class, ProjectDataType::PROJECT_TASKSID);
	}

	public function project_tasks(): HasMany
	{
		return $this->hasMany(ProjectTask::class, ProjectTask::PROJECT_TASK_U_ID, ProjectTask::U_ID);
	}
}
