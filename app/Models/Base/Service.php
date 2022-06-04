<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BusinessProfile;
use App\Models\BusinessProfileService;
use App\Models\Commission;
use App\Models\FAQ;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Payment;
use App\Models\ServiceCategoryServiceJoint;
use App\Models\ServiceNotification;
use App\Models\ServicePackage;
use App\Models\ServiceRequirement;
use App\Models\ServiceReview;
use App\Models\ServiceTire;
use App\Models\ServiceTirePackage;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Service
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $user_u_id
 * @property string $title
 * @property string $description
 * @property int|null $expected_delivery
 * @property float $location_lat
 * @property float $location_long
 * 
 * @property Collection|BusinessProfile[] $business_profiles
 * @property Collection|Commission[] $commissions
 * @property Collection|FAQ[] $f_a_q_s
 * @property Collection|OrderStatus[] $order_statuses_where_service
 * @property Collection|Order[] $orders
 * @property Collection|Payment[] $payments
 * @property Collection|ServiceCategoryServiceJoint[] $service_category_service_joints
 * @property Collection|ServiceNotification[] $service_notifications
 * @property Collection|ServicePackage[] $service_packages
 * @property Collection|ServiceRequirement[] $service_requirements
 * @property Collection|ServiceReview[] $service_reviews
 * @property Collection|ServiceTirePackage[] $service_tire_packages
 * @property Collection|ServiceTire[] $service_tires
 *
 * @package App\Models\Base
 */
class Service extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const USER_U_ID = 'user_u_id';
	const TITLE = 'title';
	const DESCRIPTION = 'description';
	const EXPECTED_DELIVERY = 'expected_delivery';
	const LOCATION_LAT = 'location_lat';
	const LOCATION_LONG = 'location_long';
	protected $connection = 'mysql';
	protected $table = 'services';

	protected $casts = [
		self::ID => 'int',
		self::EXPECTED_DELIVERY => 'int',
		self::LOCATION_LAT => 'float',
		self::LOCATION_LONG => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function business_profiles(): BelongsToMany
	{
		return $this->belongsToMany(BusinessProfile::class, 'business_profile_service', BusinessProfile::SERVICESID, BusinessProfile::BUSINESS_PROFILESID)
					->withPivot(BusinessProfileService::ID, BusinessProfileService::U_ID, BusinessProfileService::DELETED_AT)
					->withTimestamps();
	}

	public function commissions(): HasMany
	{
		return $this->hasMany(Commission::class, Commission::SERVICE_U_ID, Commission::U_ID);
	}

	public function f_a_q_s(): HasMany
	{
		return $this->hasMany(FAQ::class, FAQ::SERVICE_U_ID, FAQ::U_ID);
	}

	public function order_statuses_where_service(): HasMany
	{
		return $this->hasMany(OrderStatus::class, OrderStatus::SERVICES_U_ID, OrderStatus::U_ID);
	}

	public function orders(): HasMany
	{
		return $this->hasMany(Order::class, Order::SERVICE_U_ID, Order::U_ID);
	}

	public function payments(): HasMany
	{
		return $this->hasMany(Payment::class, Payment::SERVICE_U_ID, Payment::U_ID);
	}

	public function service_category_service_joints(): HasMany
	{
		return $this->hasMany(ServiceCategoryServiceJoint::class, ServiceCategoryServiceJoint::SERVICE_U_ID, ServiceCategoryServiceJoint::U_ID);
	}

	public function service_notifications(): HasMany
	{
		return $this->hasMany(ServiceNotification::class, ServiceNotification::SERVICE_U_ID, ServiceNotification::U_ID);
	}

	public function service_packages(): HasMany
	{
		return $this->hasMany(ServicePackage::class, ServicePackage::SERVICE_U_ID, ServicePackage::U_ID);
	}

	public function service_requirements(): HasMany
	{
		return $this->hasMany(ServiceRequirement::class, ServiceRequirement::SERVICE_U_ID, ServiceRequirement::U_ID);
	}

	public function service_reviews(): HasMany
	{
		return $this->hasMany(ServiceReview::class, ServiceReview::SERVICE_U_ID, ServiceReview::U_ID);
	}

	public function service_tire_packages(): HasMany
	{
		return $this->hasMany(ServiceTirePackage::class, ServiceTirePackage::SERVICE_U_ID, ServiceTirePackage::U_ID);
	}

	public function service_tires(): HasMany
	{
		return $this->hasMany(ServiceTire::class, ServiceTire::SERVICE_U_ID, ServiceTire::U_ID);
	}
}
