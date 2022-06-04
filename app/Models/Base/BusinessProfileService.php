<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BusinessProfile;
use App\Models\Service;
use App\Models\ServiceReview;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BusinessProfileService
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $business_profilesId
 * @property int $servicesId
 * 
 * @property BusinessProfile $business_profiles_id
 * @property Service $services_id
 * @property Collection|ServiceReview[] $service_reviews
 *
 * @package App\Models\Base
 */
class BusinessProfileService extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const BUSINESS_PROFILES_ID = 'business_profilesId';
	const SERVICES_ID = 'servicesId';
	protected $connection = 'mysql';
	protected $table = 'business_profile_service';

	protected $casts = [
		self::ID => 'int',
		self::BUSINESS_PROFILESID => 'int',
		self::SERVICESID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function business_profiles_id(): BelongsTo
	{
		return $this->belongsTo(BusinessProfile::class, BusinessProfileService::BUSINESS_PROFILESID);
	}

	public function services_id(): BelongsTo
	{
		return $this->belongsTo(Service::class, BusinessProfileService::SERVICESID);
	}

	public function service_reviews(): HasMany
	{
		return $this->hasMany(ServiceReview::class, ServiceReview::BUSINESS_PROFILE_SERVICE_U_ID, ServiceReview::U_ID);
	}
}
