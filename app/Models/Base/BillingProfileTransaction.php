<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\BillingProfile;
use App\Models\CashOut;
use App\Models\Payment;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class BillingProfileTransaction
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float $amount
 * @property bool $status
 * @property string|null $type
 * @property float|null $balance
 * @property string $billing_profile_id
 * @property string|null $transfer_to_profile_id
 * @property float|null $transaction_charge
 * @property string|null $declined_description
 * 
 * @property Collection|CashOut[] $cash_outs_where_deposi_transaction
 * @property Collection|CashOut[] $cash_outs_where_withdraw_transaction
 * @property Collection|Payment[] $payments_where_transaction
 *
 * @package App\Models\Base
 */
class BillingProfileTransaction extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const AMOUNT = 'amount';
	const STATUS = 'status';
	const TYPE = 'type';
	const BALANCE = 'balance';
	const BILLING_PROFILE_ID = 'billing_profile_id';
	const TRANSFER_TO_PROFILE_ID = 'transfer_to_profile_id';
	const TRANSACTION_CHARGE = 'transaction_charge';
	const DECLINED_DESCRIPTION = 'declined_description';
	protected $connection = 'mysql';
	protected $table = 'billing_profile_transactions';

	protected $casts = [
		self::ID => 'int',
		self::AMOUNT => 'float',
		self::STATUS => 'bool',
		self::BALANCE => 'float',
		self::TRANSACTION_CHARGE => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function transfer_to_profile_id(): BelongsTo
	{
		return $this->belongsTo(BillingProfile::class, BillingProfileTransaction::TRANSFER_TO_PROFILE_ID, BillingProfile::U_ID);
	}

	public function billing_profile_id(): BelongsTo
	{
		return $this->belongsTo(BillingProfile::class, BillingProfileTransaction::BILLING_PROFILE_ID, BillingProfile::U_ID);
	}

	public function cash_outs_where_deposi_transaction(): HasMany
	{
		return $this->hasMany(CashOut::class, CashOut::DEPOSI_TRANSACTION_U_ID, CashOut::U_ID);
	}

	public function cash_outs_where_withdraw_transaction(): HasMany
	{
		return $this->hasMany(CashOut::class, CashOut::WITHDRAW_TRANSACTION_U_ID, CashOut::U_ID);
	}

	public function payments_where_transaction(): HasMany
	{
		return $this->hasMany(Payment::class, Payment::TRANSACTION_U_ID, Payment::U_ID);
	}
}
