<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ProjectTask;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectDataType
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $name
 * @property string|null $tag
 * @property string|null $type
 * @property string|null $value
 * @property int|null $project_tasksId
 * @property string|null $tag_typesId
 * 
 * @property ProjectTask|null $project_tasks_id
 * @property \App\Models\ProjectDataType|null $tag_types_id
 * @property Collection|\App\Models\ProjectDataType[] $project_data_types_where_tag_types_id
 *
 * @package App\Models\Base
 */
class ProjectDataType extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const NAME = 'name';
	const TAG = 'tag';
	const TYPE = 'type';
	const VALUE = 'value';
	const PROJECT_TASKS_ID = 'project_tasksId';
	const TAG_TYPES_ID = 'tag_typesId';
	protected $connection = 'mysql';
	protected $table = 'project_data_types';

	protected $casts = [
		self::ID => 'int',
		self::PROJECT_TASKSID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function project_tasks_id(): BelongsTo
	{
		return $this->belongsTo(ProjectTask::class, \App\Models\ProjectDataType::PROJECT_TASKSID);
	}

	public function tag_types_id(): BelongsTo
	{
		return $this->belongsTo(\App\Models\ProjectDataType::class, \App\Models\ProjectDataType::TAG_TYPESID, \App\Models\ProjectDataType::TAG);
	}

	public function project_data_types_where_tag_types_id(): HasMany
	{
		return $this->hasMany(\App\Models\ProjectDataType::class, \App\Models\ProjectDataType::TAG_TYPESID, \App\Models\ProjectDataType::TAG);
	}
}
