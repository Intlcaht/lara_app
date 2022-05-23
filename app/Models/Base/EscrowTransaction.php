<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\CashOut;
use App\Models\Escrow;
use App\Models\EscrowTransactionCharge;
use App\Models\Payment;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class EscrowTransaction
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float $amount
 * @property bool $status
 * @property string|null $type
 * @property float|null $balance
 * @property string $escrow_u_id
 * @property float|null $transaction_charge
 * @property string|null $declined_description
 * @property string $escrow_transaction_charge_u_id
 * 
 * @property Escrow $escrow
 * @property EscrowTransactionCharge $escrow_transaction_charge
 * @property Collection|CashOut[] $cash_outs
 * @property Collection|Payment[] $payments
 *
 * @package App\Models\Base
 */
class EscrowTransaction extends BaseModel
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
	const ESCROW_U_ID = 'escrow_u_id';
	const TRANSACTION_CHARGE = 'transaction_charge';
	const DECLINED_DESCRIPTION = 'declined_description';
	const ESCROW_TRANSACTION_CHARGE_U_ID = 'escrow_transaction_charge_u_id';
	protected $connection = 'mysql';
	protected $table = 'escrow_transactions';

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

	public function escrow(): BelongsTo
	{
		return $this->belongsTo(Escrow::class, EscrowTransaction::ESCROW_U_ID, Escrow::U_ID);
	}

	public function escrow_transaction_charge(): BelongsTo
	{
		return $this->belongsTo(EscrowTransactionCharge::class, EscrowTransaction::ESCROW_TRANSACTION_CHARGE_U_ID, EscrowTransactionCharge::U_ID);
	}

	public function cash_outs(): HasMany
	{
		return $this->hasMany(CashOut::class, CashOut::ESCROW_TRANSACTION_U_ID, CashOut::U_ID);
	}

	public function payments(): HasMany
	{
		return $this->hasMany(Payment::class, Payment::ESCROW_TRANSACTION_U_ID, Payment::U_ID);
	}
}
