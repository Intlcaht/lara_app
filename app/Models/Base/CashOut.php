<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Escrow;
use App\Models\EscrowTransaction;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class CashOut
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float $amount
 * @property string $escrow_u_id
 * @property Carbon|null $period_bound_upper
 * @property Carbon|null $period_bound_lower
 * @property float|null $balance
 * @property float|null $cap_percentage
 * @property string $escrow_transaction_u_id
 * 
 * @property Escrow $escrow
 * @property EscrowTransaction $escrow_transaction
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
	const ESCROW_U_ID = 'escrow_u_id';
	const PERIOD_BOUND_UPPER = 'period_bound_upper';
	const PERIOD_BOUND_LOWER = 'period_bound_lower';
	const BALANCE = 'balance';
	const CAP_PERCENTAGE = 'cap_percentage';
	const ESCROW_TRANSACTION_U_ID = 'escrow_transaction_u_id';
	protected $connection = 'mysql';
	protected $table = 'cash_out';

	protected $casts = [
		self::ID => 'int',
		self::AMOUNT => 'float',
		self::BALANCE => 'float',
		self::CAP_PERCENTAGE => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT,
		self::PERIOD_BOUND_UPPER,
		self::PERIOD_BOUND_LOWER
	];

	public function escrow(): BelongsTo
	{
		return $this->belongsTo(Escrow::class, \App\Models\CashOut::ESCROW_U_ID, Escrow::U_ID);
	}

	public function escrow_transaction(): BelongsTo
	{
		return $this->belongsTo(EscrowTransaction::class, \App\Models\CashOut::ESCROW_TRANSACTION_U_ID, EscrowTransaction::U_ID);
	}
}
