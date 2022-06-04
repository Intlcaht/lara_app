<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Order;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceTagsNotificationsJoint;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceNotification
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $service_u_id
 * @property string $project_u_id
 * @property bool $active
 * @property float $radius
 * 
 * @property Service $service
 * @property Project $project
 * @property Collection|Order[] $orders
 * @property Collection|ServiceTagsNotificationsJoint[] $service_tags_notifications_joints
 *
 * @package App\Models\Base
 */
class ServiceNotification extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const SERVICE_U_ID = 'service_u_id';
	const PROJECT_U_ID = 'project_u_id';
	const ACTIVE = 'active';
	const RADIUS = 'radius';
	protected $connection = 'mysql';
	protected $table = 'service_notifications';

	protected $casts = [
		self::ID => 'int',
		self::ACTIVE => 'bool',
		self::RADIUS => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function service(): BelongsTo
	{
		return $this->belongsTo(Service::class, ServiceNotification::SERVICE_U_ID, Service::U_ID);
	}

	public function project(): BelongsTo
	{
		return $this->belongsTo(Project::class, ServiceNotification::PROJECT_U_ID, Project::U_ID);
	}

	public function orders(): HasMany
	{
		return $this->hasMany(Order::class, Order::SERVICE_NOTIFICATION_U_ID, Order::U_ID);
	}

	public function service_tags_notifications_joints(): HasMany
	{
		return $this->hasMany(ServiceTagsNotificationsJoint::class, ServiceTagsNotificationsJoint::SERVICE_NOTIFICATION_U_ID, ServiceTagsNotificationsJoint::U_ID);
	}
}
