<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\EscrowTransaction;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class EscrowTransactionCharge
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float $lower_bound
 * @property float $upper_bound
 * @property string $charge_type
 * @property string $transaction_type
 * @property float $charge
 * 
 * @property Collection|EscrowTransaction[] $escrow_transactions
 *
 * @package App\Models\Base
 */
class EscrowTransactionCharge extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const LOWER_BOUND = 'lower_bound';
	const UPPER_BOUND = 'upper_bound';
	const CHARGE_TYPE = 'charge_type';
	const TRANSACTION_TYPE = 'transaction_type';
	const CHARGE = 'charge';
	protected $connection = 'mysql';
	protected $table = 'escrow_transaction_charges';

	protected $casts = [
		self::ID => 'int',
		self::LOWER_BOUND => 'float',
		self::UPPER_BOUND => 'float',
		self::CHARGE => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function escrow_transactions(): HasMany
	{
		return $this->hasMany(EscrowTransaction::class, EscrowTransaction::ESCROW_TRANSACTION_CHARGE_U_ID, EscrowTransaction::U_ID);
	}
}
