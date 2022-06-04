<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ServiceNotification;
use App\Models\ServiceTag;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ServiceTagsNotificationsJoint
 * 
 * @property int $id
 * @property string $u_id
 * @property string $service_tag_u_id
 * @property string $service_notification_u_id
 * 
 * @property ServiceTag $service_tag
 * @property ServiceNotification $service_notification
 *
 * @package App\Models\Base
 */
class ServiceTagsNotificationsJoint extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const SERVICE_TAG_U_ID = 'service_tag_u_id';
	const SERVICE_NOTIFICATION_U_ID = 'service_notification_u_id';
	protected $connection = 'mysql';
	protected $table = 'service_tags_notifications_joint';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int'
	];

	public function service_tag(): BelongsTo
	{
		return $this->belongsTo(ServiceTag::class, ServiceTagsNotificationsJoint::SERVICE_TAG_U_ID, ServiceTag::U_ID);
	}

	public function service_notification(): BelongsTo
	{
		return $this->belongsTo(ServiceNotification::class, ServiceTagsNotificationsJoint::SERVICE_NOTIFICATION_U_ID, ServiceNotification::U_ID);
	}
}
