<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BusinessProfile;
use App\Models\BusinessProfileAdapterTransaction;
use App\Models\Payment;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class BusinessProfileAdapter
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property bool $active
 * @property string $profile_u_id
 * @property float|null $loss
 * @property float|null $profit
 * @property float|null $max_payment
 * @property float|null $min_payment
 * @property float $balance
 * 
 * @property BusinessProfile $profile
 * @property Collection|BusinessProfileAdapterTransaction[] $business_profile_adapter_transactions
 * @property Collection|Payment[] $payments
 *
 * @package App\Models\Base
 */
class BusinessProfileAdapter extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const ACTIVE = 'active';
	const PROFILE_U_ID = 'profile_u_id';
	const LOSS = 'loss';
	const PROFIT = 'profit';
	const MAX_PAYMENT = 'max_payment';
	const MIN_PAYMENT = 'min_payment';
	const BALANCE = 'balance';
	protected $connection = 'mysql';
	protected $table = 'business_profile_adapter';

	protected $casts = [
		self::ID => 'int',
		self::ACTIVE => 'bool',
		self::LOSS => 'float',
		self::PROFIT => 'float',
		self::MAX_PAYMENT => 'float',
		self::MIN_PAYMENT => 'float',
		self::BALANCE => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function profile(): BelongsTo
	{
		return $this->belongsTo(BusinessProfile::class, BusinessProfileAdapter::PROFILE_U_ID, BusinessProfile::U_ID);
	}

	public function business_profile_adapter_transactions(): HasMany
	{
		return $this->hasMany(BusinessProfileAdapterTransaction::class, BusinessProfileAdapterTransaction::BUSINESS_PROFILE_ADAPTER_U_ID, BusinessProfileAdapterTransaction::U_ID);
	}

	public function payments(): HasMany
	{
		return $this->hasMany(Payment::class, Payment::BUSINESS_PROFILE_ADAPTER_U_ID, Payment::U_ID);
	}
}
