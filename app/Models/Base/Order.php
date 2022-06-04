<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BusinessProfile;
use App\Models\BusinessProfileAdapterTransaction;
use App\Models\Earning;
use App\Models\OrderAttachment;
use App\Models\OrderStatusProvider;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceNotification;
use App\Models\ServiceTagsBusinessProfileJointDuration;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $service_u_id
 * @property string $project_u_id
 * @property string|null $business_profile_u_id
 * @property string|null $description
 * @property string|null $service_tags_business_profile_joint_duration_u_id
 * @property string $service_notification_u_id
 * 
 * @property Service|null $service
 * @property Project $project
 * @property BusinessProfile|null $business_profile
 * @property ServiceTagsBusinessProfileJointDuration|null $service_tags_business_profile_joint_duration
 * @property ServiceNotification $service_notification
 * @property Collection|BusinessProfileAdapterTransaction[] $business_profile_adapter_transactions
 * @property Collection|Earning[] $earnings
 * @property Collection|OrderAttachment[] $order_attachments
 * @property Collection|OrderStatusProvider[] $order_status_providers_where_complete_status_order
 * @property Collection|OrderStatusProvider[] $order_status_providers_where_current_status_order
 * @property Collection|Payment[] $payments
 *
 * @package App\Models\Base
 */
class Order extends BaseModel
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
	const BUSINESS_PROFILE_U_ID = 'business_profile_u_id';
	const DESCRIPTION = 'description';
	const SERVICE_TAGS_BUSINESS_PROFILE_JOINT_DURATION_U_ID = 'service_tags_business_profile_joint_duration_u_id';
	const SERVICE_NOTIFICATION_U_ID = 'service_notification_u_id';
	protected $connection = 'mysql';
	protected $table = 'orders';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function service(): BelongsTo
	{
		return $this->belongsTo(Service::class, \App\Models\Order::SERVICE_U_ID, Service::U_ID);
	}

	public function project(): BelongsTo
	{
		return $this->belongsTo(Project::class, \App\Models\Order::PROJECT_U_ID, Project::U_ID);
	}

	public function business_profile(): BelongsTo
	{
		return $this->belongsTo(BusinessProfile::class, \App\Models\Order::BUSINESS_PROFILE_U_ID, BusinessProfile::U_ID);
	}

	public function service_tags_business_profile_joint_duration(): BelongsTo
	{
		return $this->belongsTo(ServiceTagsBusinessProfileJointDuration::class, \App\Models\Order::SERVICE_TAGS_BUSINESS_PROFILE_JOINT_DURATION_U_ID, ServiceTagsBusinessProfileJointDuration::U_ID);
	}

	public function service_notification(): BelongsTo
	{
		return $this->belongsTo(ServiceNotification::class, \App\Models\Order::SERVICE_NOTIFICATION_U_ID, ServiceNotification::U_ID);
	}

	public function business_profile_adapter_transactions(): HasMany
	{
		return $this->hasMany(BusinessProfileAdapterTransaction::class, BusinessProfileAdapterTransaction::ORDER_U_ID, BusinessProfileAdapterTransaction::U_ID);
	}

	public function earnings(): HasMany
	{
		return $this->hasMany(Earning::class, Earning::ORDER_U_ID, Earning::U_ID);
	}

	public function order_attachments(): HasMany
	{
		return $this->hasMany(OrderAttachment::class, OrderAttachment::ORDER_U_ID, OrderAttachment::U_ID);
	}

	public function order_status_providers_where_complete_status_order(): HasMany
	{
		return $this->hasMany(OrderStatusProvider::class, OrderStatusProvider::COMPLETE_STATUS_ORDER_U_ID, OrderStatusProvider::U_ID);
	}

	public function order_status_providers_where_current_status_order(): HasMany
	{
		return $this->hasMany(OrderStatusProvider::class, OrderStatusProvider::CURRENT_STATUS_ORDER_U_ID, OrderStatusProvider::U_ID);
	}

	public function payments(): HasMany
	{
		return $this->hasMany(Payment::class, Payment::ORDER_U_ID, Payment::U_ID);
	}
}
