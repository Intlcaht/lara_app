<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BalanceSettlement;
use App\Models\BaseModel;
use App\Models\BillingProfile;
use App\Models\Blog;
use App\Models\BusinessAttachment;
use App\Models\BusinessProfileAdapter;
use App\Models\BusinessProfileService;
use App\Models\CashOut;
use App\Models\Order;
use App\Models\Service;
use App\Models\ServiceTag;
use App\Models\ServiceTagsBusinessProfileJoint;
use App\Models\User;
use App\Models\UserBusinessProfile;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BusinessProfile
 * 
 * @property int $id
 * @property string $u_id
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
 * @property Collection|BalanceSettlement[] $balance_settlements_where_user
 * @property Collection|BillingProfile[] $billing_profiles
 * @property Collection|Blog[] $blogs
 * @property Collection|BusinessAttachment[] $business_attachments
 * @property Collection|BusinessProfileAdapter[] $business_profile_adapters_where_profile
 * @property Collection|Service[] $services
 * @property Collection|CashOut[] $cash_outs_where_user
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

	public function balance_settlements_where_user(): HasMany
	{
		return $this->hasMany(BalanceSettlement::class, BalanceSettlement::USER_U_ID, BalanceSettlement::U_ID);
	}

	public function billing_profiles(): HasMany
	{
		return $this->hasMany(BillingProfile::class, BillingProfile::BUSINESS_PROFILE_U_ID, BillingProfile::U_ID);
	}

	public function blogs(): HasMany
	{
		return $this->hasMany(Blog::class, Blog::BUSINESS_PROFILE_U_ID, Blog::U_ID);
	}

	public function business_attachments(): HasMany
	{
		return $this->hasMany(BusinessAttachment::class, BusinessAttachment::BUSINESS_PROFILE_U_ID, BusinessAttachment::U_ID);
	}

	public function business_profile_adapters_where_profile(): HasMany
	{
		return $this->hasMany(BusinessProfileAdapter::class, BusinessProfileAdapter::PROFILE_U_ID, BusinessProfileAdapter::U_ID);
	}

	public function services(): BelongsToMany
	{
		return $this->belongsToMany(Service::class, 'business_profile_service', Service::BUSINESS_PROFILESID, Service::SERVICESID)
					->withPivot(BusinessProfileService::ID, BusinessProfileService::U_ID, BusinessProfileService::DELETED_AT)
					->withTimestamps();
	}

	public function cash_outs_where_user(): HasMany
	{
		return $this->hasMany(CashOut::class, CashOut::USER_U_ID, CashOut::U_ID);
	}

	public function orders(): HasMany
	{
		return $this->hasMany(Order::class, Order::BUSINESS_PROFILE_U_ID, Order::U_ID);
	}

	public function service_tags(): BelongsToMany
	{
		return $this->belongsToMany(ServiceTag::class, 'service_tags_business_profile_joint', ServiceTag::PROFILE_U_ID, ServiceTag::TAG_U_ID)
					->withPivot(ServiceTagsBusinessProfileJoint::ID, ServiceTagsBusinessProfileJoint::U_ID, ServiceTagsBusinessProfileJoint::DELETED_AT, ServiceTagsBusinessProfileJoint::RATE_AMOUNT, ServiceTagsBusinessProfileJoint::RATE_TYPE, ServiceTagsBusinessProfileJoint::PRIVACY_POLICY)
					->withTimestamps();
	}

	public function users(): BelongsToMany
	{
		return $this->belongsToMany(User::class, 'user_business_profiles', User::PROFILE_U_ID, User::USER_U_ID)
					->withPivot(UserBusinessProfile::ID, UserBusinessProfile::U_ID, UserBusinessProfile::DELETED_AT)
					->withTimestamps();
	}
}
