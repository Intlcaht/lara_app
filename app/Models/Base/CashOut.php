<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BalanceSettlement;
use App\Models\BaseModel;
use App\Models\BillingProfileTransaction;
use App\Models\BusinessProfile;
use App\Models\Earning;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class CashOut
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float $amount
 * @property string $user_u_id
 * @property Carbon|null $period_bound_upper
 * @property Carbon|null $period_bound_lower
 * @property float|null $cash_amount
 * @property float|null $e_wallet_amount
 * @property float|null $wallet_balance
 * @property float|null $cap_percentage
 * @property string|null $balance_settlement_u_id
 * @property string $deposi_transaction_u_id
 * @property string $withdraw_transaction_u_id
 * 
 * @property BusinessProfile $user
 * @property BalanceSettlement|null $balance_settlement
 * @property BillingProfileTransaction $deposi_transaction
 * @property BillingProfileTransaction $withdraw_transaction
 * @property Collection|Earning[] $earnings
 *
 * @package App\Models\Base
 */
class CashOut extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const AMOUNT = 'amount';
	const USER_U_ID = 'user_u_id';
	const PERIOD_BOUND_UPPER = 'period_bound_upper';
	const PERIOD_BOUND_LOWER = 'period_bound_lower';
	const CASH_AMOUNT = 'cash_amount';
	const E_WALLET_AMOUNT = 'e_wallet_amount';
	const WALLET_BALANCE = 'wallet_balance';
	const CAP_PERCENTAGE = 'cap_percentage';
	const BALANCE_SETTLEMENT_U_ID = 'balance_settlement_u_id';
	const DEPOSI_TRANSACTION_U_ID = 'deposi_transaction_u_id';
	const WITHDRAW_TRANSACTION_U_ID = 'withdraw_transaction_u_id';
	protected $connection = 'mysql';
	protected $table = 'cash_out';

	protected $casts = [
		self::ID => 'int',
		self::AMOUNT => 'float',
		self::CASH_AMOUNT => 'float',
		self::E_WALLET_AMOUNT => 'float',
		self::WALLET_BALANCE => 'float',
		self::CAP_PERCENTAGE => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT,
		self::PERIOD_BOUND_UPPER,
		self::PERIOD_BOUND_LOWER
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(BusinessProfile::class, \App\Models\CashOut::USER_U_ID, BusinessProfile::U_ID);
	}

	public function balance_settlement(): BelongsTo
	{
		return $this->belongsTo(BalanceSettlement::class, \App\Models\CashOut::BALANCE_SETTLEMENT_U_ID, BalanceSettlement::U_ID);
	}

	public function deposi_transaction(): BelongsTo
	{
		return $this->belongsTo(BillingProfileTransaction::class, \App\Models\CashOut::DEPOSI_TRANSACTION_U_ID, BillingProfileTransaction::U_ID);
	}

	public function withdraw_transaction(): BelongsTo
	{
		return $this->belongsTo(BillingProfileTransaction::class, \App\Models\CashOut::WITHDRAW_TRANSACTION_U_ID, BillingProfileTransaction::U_ID);
	}

	public function earnings(): HasMany
	{
		return $this->hasMany(Earning::class, Earning::CASH_OUT_U_ID, Earning::U_ID);
	}
}
