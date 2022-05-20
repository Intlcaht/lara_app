<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\BillingProfileTransaction;
use App\Models\CheckinUser;
use App\Models\Commission;
use App\Models\Order;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
 * @property string $payment_id
 * @property string $description
 * @property string $transaction_u_id
 * @property string $order_u_id
 * 
 * @property CheckinUser|null $checkin_user
 * @property BillingProfileTransaction $transaction
 * @property Order $order
 * @property Collection|Commission[] $commissions_where_payments_id
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
	const PAYMENT_ID = 'payment_id';
	const DESCRIPTION = 'description';
	const TRANSACTION_U_ID = 'transaction_u_id';
	const ORDER_U_ID = 'order_u_id';
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

	public function transaction(): BelongsTo
	{
		return $this->belongsTo(BillingProfileTransaction::class, \App\Models\Payment::TRANSACTION_U_ID, BillingProfileTransaction::U_ID);
	}

	public function order(): BelongsTo
	{
		return $this->belongsTo(Order::class, \App\Models\Payment::ORDER_U_ID, Order::U_ID);
	}

	public function commissions_where_payments_id(): HasMany
	{
		return $this->hasMany(Commission::class, Commission::PAYMENTSID);
	}
}
