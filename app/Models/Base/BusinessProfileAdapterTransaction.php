<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\BusinessProfileAdapter;
use App\Models\Order;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class BusinessProfileAdapterTransaction
 * 
 * @property int $id
 * @property string $u_id
 * @property string $order_u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float $balance
 * @property float $confirmed_bid
 * @property string $confirmed_bid_type
 * @property string $type
 * @property string $business_profile_adapter_u_id
 * 
 * @property Order $order
 * @property BusinessProfileAdapter $business_profile_adapter
 *
 * @package App\Models\Base
 */
class BusinessProfileAdapterTransaction extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const ORDER_U_ID = 'order_u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const BALANCE = 'balance';
	const CONFIRMED_BID = 'confirmed_bid';
	const CONFIRMED_BID_TYPE = 'confirmed_bid_type';
	const TYPE = 'type';
	const BUSINESS_PROFILE_ADAPTER_U_ID = 'business_profile_adapter_u_id';
	protected $connection = 'mysql';
	protected $table = 'business_profile_adapter_transactions';

	protected $casts = [
		self::ID => 'int',
		self::BALANCE => 'float',
		self::CONFIRMED_BID => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function order(): BelongsTo
	{
		return $this->belongsTo(Order::class, BusinessProfileAdapterTransaction::ORDER_U_ID, Order::U_ID);
	}

	public function business_profile_adapter(): BelongsTo
	{
		return $this->belongsTo(BusinessProfileAdapter::class, BusinessProfileAdapterTransaction::BUSINESS_PROFILE_ADAPTER_U_ID, BusinessProfileAdapter::U_ID);
	}
}
