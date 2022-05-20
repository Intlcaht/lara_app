<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\BusinessProfile;
use App\Models\CashOut;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class BalanceSettlement
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property float $amount
 * @property string $status
 * @property string $user_u_id
 * @property float|null $fullfilled_amount
 * @property Carbon|null $fullfilled_date
 * @property string|null $description
 * 
 * @property BusinessProfile $user
 * @property Collection|CashOut[] $cash_outs
 *
 * @package App\Models\Base
 */
class BalanceSettlement extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const AMOUNT = 'amount';
	const STATUS = 'status';
	const USER_U_ID = 'user_u_id';
	const FULLFILLED_AMOUNT = 'fullfilled_amount';
	const FULLFILLED_DATE = 'fullfilled_date';
	const DESCRIPTION = 'description';
	protected $connection = 'mysql';
	protected $table = 'balance_settlements';

	protected $casts = [
		self::ID => 'int',
		self::AMOUNT => 'float',
		self::FULLFILLED_AMOUNT => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT,
		self::FULLFILLED_DATE
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(BusinessProfile::class, \App\Models\BalanceSettlement::USER_U_ID, BusinessProfile::U_ID);
	}

	public function cash_outs(): HasMany
	{
		return $this->hasMany(CashOut::class, CashOut::BALANCE_SETTLEMENT_U_ID, CashOut::U_ID);
	}
}
