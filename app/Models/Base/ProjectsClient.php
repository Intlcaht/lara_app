<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Project;
use App\Models\User;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProjectsClient
 * 
 * @property int $id
 * @property string $project_u_id
 * @property string $user_u_id
 * @property string $user_type
 * @property string $status
 * 
 * @property Project $project
 * @property User $user
 *
 * @package App\Models\Base
 */
class ProjectsClient extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const PROJECT_U_ID = 'project_u_id';
	const USER_U_ID = 'user_u_id';
	const USER_TYPE = 'user_type';
	const STATUS = 'status';
	protected $connection = 'mysql';
	protected $table = 'projects_clients';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int'
	];

	public function project(): BelongsTo
	{
		return $this->belongsTo(Project::class, ProjectsClient::PROJECT_U_ID, Project::U_ID);
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, ProjectsClient::USER_U_ID, User::U_ID);
	}
}
