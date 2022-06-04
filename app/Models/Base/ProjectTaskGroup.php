<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CheckIn;
use App\Models\ProjectTask;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectTaskGroup
 * 
 * @property int $id
 * @property string $u_id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|CheckIn[] $check_ins
 * @property Collection|ProjectTask[] $project_tasks
 *
 * @package App\Models\Base
 */
class ProjectTaskGroup extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const NAME = 'name';
	const DESCRIPTION = 'description';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	protected $connection = 'mysql';
	protected $table = 'project_task_group';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function check_ins(): HasMany
	{
		return $this->hasMany(CheckIn::class, CheckIn::PROJECT_TASK_GROUP_U_ID, CheckIn::U_ID);
	}

	public function project_tasks(): HasMany
	{
		return $this->hasMany(ProjectTask::class, ProjectTask::PROJECT_TASK_GROUP_U_ID, ProjectTask::U_ID);
	}
}
