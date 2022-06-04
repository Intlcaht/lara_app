<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BusinessProfile;
use App\Models\OrderStatusProvider;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class OrderStatusBusinessProfile
 * 
 * @property int $id
 * @property string $profile_u_id
 * @property string $order_status_providers_u_id
 * 
 * @property BusinessProfile $profile
 * @property OrderStatusProvider $order_status_providers
 *
 * @package App\Models\Base
 */
class OrderStatusBusinessProfile extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const PROFILE_U_ID = 'profile_u_id';
	const ORDER_STATUS_PROVIDERS_U_ID = 'order_status_providers_u_id';
	protected $connection = 'mysql';
	protected $table = 'order_status_business_profiles';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int'
	];

	public function profile(): BelongsTo
	{
		return $this->belongsTo(BusinessProfile::class, \App\Models\OrderStatusBusinessProfile::PROFILE_U_ID, BusinessProfile::U_ID);
	}

	public function order_status_providers(): BelongsTo
	{
		return $this->belongsTo(OrderStatusProvider::class, \App\Models\OrderStatusBusinessProfile::ORDER_STATUS_PROVIDERS_U_ID, OrderStatusProvider::U_ID);
	}
}
