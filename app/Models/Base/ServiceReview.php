<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BusinessProfileService;
use App\Models\Service;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceReview
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $service_u_id
 * @property string $title
 * @property string $comment
 * @property float $rating
 * @property string|null $business_profile_service_u_id
 * 
 * @property Service $service
 * @property BusinessProfileService|null $business_profile_service
 *
 * @package App\Models\Base
 */
class ServiceReview extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const SERVICE_U_ID = 'service_u_id';
	const TITLE = 'title';
	const COMMENT = 'comment';
	const RATING = 'rating';
	const BUSINESS_PROFILE_SERVICE_U_ID = 'business_profile_service_u_id';
	protected $connection = 'mysql';
	protected $table = 'service_reviews';

	protected $casts = [
		self::ID => 'int',
		self::RATING => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function service(): BelongsTo
	{
		return $this->belongsTo(Service::class, ServiceReview::SERVICE_U_ID, Service::U_ID);
	}

	public function business_profile_service(): BelongsTo
	{
		return $this->belongsTo(BusinessProfileService::class, ServiceReview::BUSINESS_PROFILE_SERVICE_U_ID, BusinessProfileService::U_ID);
	}
}
