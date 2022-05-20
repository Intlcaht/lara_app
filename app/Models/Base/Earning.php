<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\CashOut;
use App\Models\CheckinUser;
use App\Models\Order;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Earning
 * 
 * @property int $id
 * @property string $u_id
 * @property string|null $checkin_user_u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property float $amount
 * @property string $status
 * @property string $description
 * @property string|null $cash_out_u_id
 * @property string|null $order_u_id
 * 
 * @property CheckinUser|null $checkin_user
 * @property CashOut|null $cash_out
 * @property Order|null $order
 *
 * @package App\Models\Base
 */
class Earning extends BaseModel
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
	const STATUS = 'status';
	const DESCRIPTION = 'description';
	const CASH_OUT_U_ID = 'cash_out_u_id';
	const ORDER_U_ID = 'order_u_id';
	protected $connection = 'mysql';
	protected $table = 'earnings';

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
		return $this->belongsTo(CheckinUser::class, \App\Models\Earning::CHECKIN_USER_U_ID, CheckinUser::U_ID);
	}

	public function cash_out(): BelongsTo
	{
		return $this->belongsTo(CashOut::class, \App\Models\Earning::CASH_OUT_U_ID, CashOut::U_ID);
	}

	public function order(): BelongsTo
	{
		return $this->belongsTo(Order::class, \App\Models\Earning::ORDER_U_ID, Order::U_ID);
	}
}
