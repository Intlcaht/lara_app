<?php

namespace App\Models;

use App\Models\Base\ServiceTagsNotificationsJoint as BaseServiceTagsNotificationsJoint;

class ServiceTagsNotificationsJoint extends BaseServiceTagsNotificationsJoint
{
	protected $fillable = [
		self::U_ID,
		self::SERVICE_TAG_U_ID,
		self::SERVICE_NOTIFICATION_U_ID
	];
}
