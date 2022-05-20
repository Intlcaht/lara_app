<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\Order;
use App\Models\ServiceTagsBusinessProfileJoint;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceTagsBusinessProfileJointDuration
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $service_tags_business_profile_joint_u_id
 * @property string $day_of_week
 * @property string $duration_type
 * @property Carbon|null $time_start
 * @property Carbon|null $time_end
 * 
 * @property ServiceTagsBusinessProfileJoint|null $service_tags_business_profile_joint
 * @property Collection|Order[] $orders
 *
 * @package App\Models\Base
 */
class ServiceTagsBusinessProfileJointDuration extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const SERVICE_TAGS_BUSINESS_PROFILE_JOINT_U_ID = 'service_tags_business_profile_joint_u_id';
	const DAY_OF_WEEK = 'day_of_week';
	const DURATION_TYPE = 'duration_type';
	const TIME_START = 'time_start';
	const TIME_END = 'time_end';
	protected $connection = 'mysql';
	protected $table = 'service_tags_business_profile_joint_durations';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT,
		self::TIME_START,
		self::TIME_END
	];

	public function service_tags_business_profile_joint(): BelongsTo
	{
		return $this->belongsTo(ServiceTagsBusinessProfileJoint::class, ServiceTagsBusinessProfileJointDuration::SERVICE_TAGS_BUSINESS_PROFILE_JOINT_U_ID, ServiceTagsBusinessProfileJoint::U_ID);
	}

	public function orders(): HasMany
	{
		return $this->hasMany(Order::class, Order::SERVICE_TAGS_BUSINESS_PROFILE_JOINT_DURATION_U_ID, Order::U_ID);
	}
}
