<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\BusinessProfile;
use App\Models\BusinessProfileAdapterTransaction;
use App\Models\Payment;
use App\Traits\FormatDates;
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
 * @property string $adapter_u_id
 * @property string $profile_u_id
 * @property float|null $min_amount
 * @property float|null $max_amount
 * @property float|null $max_percentage
 * @property float|null $min_percentage
 * @property float|null $percentage
 * @property float $balance
 * @property string $type
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
	const ADAPTER_U_ID = 'adapter_u_id';
	const PROFILE_U_ID = 'profile_u_id';
	const MIN_AMOUNT = 'min_amount';
	const MAX_AMOUNT = 'max_amount';
	const MAX_PERCENTAGE = 'max_percentage';
	const MIN_PERCENTAGE = 'min_percentage';
	const PERCENTAGE = 'percentage';
	const BALANCE = 'balance';
	const TYPE = 'type';
	protected $connection = 'mysql';
	protected $table = 'business_profile_adapter';

	protected $casts = [
		self::ID => 'int',
		self::MIN_AMOUNT => 'float',
		self::MAX_AMOUNT => 'float',
		self::MAX_PERCENTAGE => 'float',
		self::MIN_PERCENTAGE => 'float',
		self::PERCENTAGE => 'float',
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
