<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Blog;
use App\Models\BusinessAttachment;
use App\Models\BusinessProfileAdapter;
use App\Models\BusinessProfileService;
use App\Models\Escrow;
use App\Models\Order;
use App\Models\OrderStatusBusinessProfile;
use App\Models\Service;
use App\Models\ServiceTag;
use App\Models\ServiceTagsBusinessProfileJoint;
use App\Models\User;
use App\Models\UserBusinessProfile;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BusinessProfile
 *
 * @property int $id
 * @property string $u_id
 * @property string|null $escrow_u_id
 * @property string $service_notifier_user_u_id
 * @property float|null $cap_percentage
 * @property bool $is_online
 * @property string $address
 * @property string $title
 * @property string $description
 * @property string|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $terms_and_conditions
 *
 * @property Escrow|null $escrow
 * @property User $service_notifier_user
 * @property Collection|Blog[] $blogs
 * @property Collection|BusinessAttachment[] $business_attachments
 * @property Collection|BusinessProfileAdapter[] $business_profile_adapters_where_profile
 * @property Collection|Service[] $services
 * @property Collection|OrderStatusBusinessProfile[] $order_status_business_profiles_where_profile
 * @property Collection|Order[] $orders
 * @property Collection|ServiceTag[] $service_tags
 * @property Collection|User[] $users
 *
 * @package App\Models\Base
 */
class BusinessProfile extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const ESCROW_U_ID = 'escrow_u_id';
	const SERVICE_NOTIFIER_USER_U_ID = 'service_notifier_user_u_id';
	const CAP_PERCENTAGE = 'cap_percentage';
	const IS_ONLINE = 'is_online';
	const ADDRESS = 'address';
	const TITLE = 'title';
	const DESCRIPTION = 'description';
	const STATUS = 'status';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const TERMS_AND_CONDITIONS = 'terms_and_conditions';
	protected $connection = 'mysql';
	protected $table = 'business_profiles';

	protected $casts = [
		self::ID => 'int',
		self::CAP_PERCENTAGE => 'float',
		self::IS_ONLINE => 'bool'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function escrow(): BelongsTo
	{
		return $this->belongsTo(Escrow::class, \App\Models\BusinessProfile::ESCROW_U_ID, Escrow::U_ID);
	}

	public function service_notifier_user(): BelongsTo
	{
		return $this->belongsTo(User::class, \App\Models\BusinessProfile::SERVICE_NOTIFIER_USER_U_ID, User::U_ID);
	}

	public function blogs(): HasMany
	{
		return $this->hasMany(Blog::class, Blog::BUSINESS_PROFILE_U_ID, Blog::U_ID);
	}

	public function business_attachments(): HasMany
	{
		return $this->hasMany(BusinessAttachment::class, BusinessAttachment::BUSINESS_PROFILE_U_ID, BusinessProfile::U_ID);
	}

	public function business_profile_adapters_where_profile(): HasMany
	{
		return $this->hasMany(BusinessProfileAdapter::class, BusinessProfileAdapter::PROFILE_U_ID, BusinessProfile::U_ID);
	}

	public function services(): BelongsToMany
	{
		return $this->belongsToMany(Service::class, 'business_profile_service', BusinessProfileService::BUSINESS_PROFILES_ID, BusinessProfileService::SERVICES_ID)
					->withPivot(BusinessProfileService::ID, BusinessProfileService::U_ID, BusinessProfileService::DELETED_AT)
					->withTimestamps();
	}

	public function order_status_business_profiles_where_profile(): HasMany
	{
		return $this->hasMany(OrderStatusBusinessProfile::class, OrderStatusBusinessProfile::PROFILE_U_ID, BusinessProfile::U_ID);
	}

	public function orders(): HasMany
	{
		return $this->hasMany(Order::class, Order::BUSINESS_PROFILE_U_ID, Order::U_ID);
	}

	public function service_tags(): BelongsToMany
	{
		return $this->belongsToMany(ServiceTag::class, 'service_tags_business_profile_joint', ServiceTagsBusinessProfileJoint::PROFILE_U_ID, ServiceTagsBusinessProfileJoint::TAG_U_ID)
					->withPivot(ServiceTagsBusinessProfileJoint::ID, ServiceTagsBusinessProfileJoint::U_ID, ServiceTagsBusinessProfileJoint::DELETED_AT, ServiceTagsBusinessProfileJoint::RATE_AMOUNT, ServiceTagsBusinessProfileJoint::RATE_TYPE, ServiceTagsBusinessProfileJoint::PRIVACY_POLICY)
					->withTimestamps();
	}

	public function users(): BelongsToMany
	{
		return $this->belongsToMany(User::class, 'user_business_profiles', UserBusinessProfile::PROFILE_U_ID, UserBusinessProfile::USER_U_ID)
					->withPivot(UserBusinessProfile::ID, UserBusinessProfile::U_ID, UserBusinessProfile::DELETED_AT)
					->withTimestamps();
	}
}
