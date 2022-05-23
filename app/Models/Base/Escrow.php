<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\BusinessProfile;
use App\Models\CashOut;
use App\Models\EscrowTransaction;
use App\Models\PaymentDetail;
use App\Traits\FormatDates;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Escrow
 * 
 * @property int $id
 * @property string $u_id
 * @property float $balance
 * 
 * @property Collection|BusinessProfile[] $business_profiles
 * @property Collection|CashOut[] $cash_outs
 * @property Collection|EscrowTransaction[] $escrow_transactions
 * @property Collection|PaymentDetail[] $payment_details
 *
 * @package App\Models\Base
 */
class Escrow extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const BALANCE = 'balance';
	protected $connection = 'mysql';
	protected $table = 'escrows';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int',
		self::BALANCE => 'float'
	];

	public function business_profiles(): HasMany
	{
		return $this->hasMany(BusinessProfile::class, BusinessProfile::ESCROW_U_ID, BusinessProfile::U_ID);
	}

	public function cash_outs(): HasMany
	{
		return $this->hasMany(CashOut::class, CashOut::ESCROW_U_ID, CashOut::U_ID);
	}

	public function escrow_transactions(): HasMany
	{
		return $this->hasMany(EscrowTransaction::class, EscrowTransaction::ESCROW_U_ID, EscrowTransaction::U_ID);
	}

	public function payment_details(): HasMany
	{
		return $this->hasMany(PaymentDetail::class, PaymentDetail::ESCROW_U_ID, PaymentDetail::U_ID);
	}
}
