<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Service;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceRequirement
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $title
 * @property string|null $description
 * @property int|null $parent_requirementsId
 * @property string|null $service_u_id
 * 
 * @property ServiceRequirement|null $parent_requirements_id
 * @property Service|null $service
 * @property Collection|ServiceRequirement[] $service_requirements_where_parent_requirements_id
 *
 * @package App\Models\Base
 */
class ServiceRequirement extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const TITLE = 'title';
	const DESCRIPTION = 'description';
	const PARENT_REQUIREMENTS_ID = 'parent_requirementsId';
	const SERVICE_U_ID = 'service_u_id';
	protected $connection = 'mysql';
	protected $table = 'service_requirements';

	protected $casts = [
		self::ID => 'int',
		self::PARENT_REQUIREMENTSID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function parent_requirements_id(): BelongsTo
	{
		return $this->belongsTo(ServiceRequirement::class, ServiceRequirement::PARENT_REQUIREMENTSID);
	}

	public function service(): BelongsTo
	{
		return $this->belongsTo(Service::class, ServiceRequirement::SERVICE_U_ID, Service::U_ID);
	}

	public function service_requirements_where_parent_requirements_id(): HasMany
	{
		return $this->hasMany(ServiceRequirement::class, ServiceRequirement::PARENT_REQUIREMENTSID);
	}
}
