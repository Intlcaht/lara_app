<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\Project;
use App\Models\ServiceTag;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProjectServiceTagJoint
 * 
 * @property int $id
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $tag_u_id
 * @property string $project_u_id
 * 
 * @property ServiceTag $tag
 * @property Project $project
 *
 * @package App\Models\Base
 */
class ProjectServiceTagJoint extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const DESCRIPTION = 'description';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const TAG_U_ID = 'tag_u_id';
	const PROJECT_U_ID = 'project_u_id';
	protected $connection = 'mysql';
	protected $table = 'project_service_tag_joint';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function tag(): BelongsTo
	{
		return $this->belongsTo(ServiceTag::class, ProjectServiceTagJoint::TAG_U_ID, ServiceTag::U_ID);
	}

	public function project(): BelongsTo
	{
		return $this->belongsTo(Project::class, ProjectServiceTagJoint::PROJECT_U_ID, Project::U_ID);
	}
}
