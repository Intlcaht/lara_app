<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\Project;
use App\Models\User;
use App\Traits\FormatDates;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ProjectsClient
 * 
 * @property int $id
 * @property string $project_u_id
 * @property string $user_u_iId
 * @property string $user_type
 * @property string $status
 * 
 * @property Project $project
 * @property User $user_u_i_id
 *
 * @package App\Models\Base
 */
class ProjectsClient extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const PROJECT_U_ID = 'project_u_id';
	const USER_U_I_ID = 'user_u_iId';
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

	public function user_u_i_id(): BelongsTo
	{
		return $this->belongsTo(User::class, ProjectsClient::USER_U_IID, User::U_ID);
	}
}
