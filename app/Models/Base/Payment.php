<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\BusinessProfileAdapter;
use App\Models\CheckinUser;
use App\Models\EscrowTransaction;
use App\Models\Order;
use App\Models\Service;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Payment
 * 
 * @property int $id
 * @property string $u_id
 * @property string|null $checkin_user_u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property float $amount
 * @property string $description
 * @property string $order_u_id
 * @property string $business_profile_adapter_u_id
 * @property string $service_u_id
 * @property string|null $escrow_transaction_u_id
 * 
 * @property CheckinUser|null $checkin_user
 * @property Order $order
 * @property BusinessProfileAdapter $business_profile_adapter
 * @property Service $service
 * @property EscrowTransaction|null $escrow_transaction
 *
 * @package App\Models\Base
 */
class Payment extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CHECKIN_USER_U_ID = 'checkin_user_u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const AMOUNT = 'amount';
	const DESCRIPTION = 'description';
	const ORDER_U_ID = 'order_u_id';
	const BUSINESS_PROFILE_ADAPTER_U_ID = 'business_profile_adapter_u_id';
	const SERVICE_U_ID = 'service_u_id';
	const ESCROW_TRANSACTION_U_ID = 'escrow_transaction_u_id';
	protected $connection = 'mysql';
	protected $table = 'payments';

	protected $casts = [
		self::ID => 'int',
		self::AMOUNT => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function checkin_user(): BelongsTo
	{
		return $this->belongsTo(CheckinUser::class, \App\Models\Payment::CHECKIN_USER_U_ID, CheckinUser::U_ID);
	}

	public function order(): BelongsTo
	{
		return $this->belongsTo(Order::class, \App\Models\Payment::ORDER_U_ID, Order::U_ID);
	}

	public function business_profile_adapter(): BelongsTo
	{
		return $this->belongsTo(BusinessProfileAdapter::class, \App\Models\Payment::BUSINESS_PROFILE_ADAPTER_U_ID, BusinessProfileAdapter::U_ID);
	}

	public function service(): BelongsTo
	{
		return $this->belongsTo(Service::class, \App\Models\Payment::SERVICE_U_ID, Service::U_ID);
	}

	public function escrow_transaction(): BelongsTo
	{
		return $this->belongsTo(EscrowTransaction::class, \App\Models\Payment::ESCROW_TRANSACTION_U_ID, EscrowTransaction::U_ID);
	}
}
