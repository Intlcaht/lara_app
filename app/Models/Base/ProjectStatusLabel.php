<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\ProjectTask;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectStatusLabel
 * 
 * @property int $id
 * @property string $labels
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|ProjectTask[] $project_tasks_where_project_status_labels_id
 *
 * @package App\Models\Base
 */
class ProjectStatusLabel extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const LABELS = 'labels';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	protected $connection = 'mysql';
	protected $table = 'project_status_labels';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function project_tasks_where_project_status_labels_id(): HasMany
	{
		return $this->hasMany(ProjectTask::class, ProjectTask::PROJECT_STATUS_LABELSID);
	}
}
