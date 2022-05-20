<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\BillingProfileTransaction;
use App\Models\BusinessProfile;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BillingProfile
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $type
 * @property string|null $account_id
 * @property float|null $amount
 * @property string|null $card_number
 * @property Carbon|null $expiry_date
 * @property bool|null $phone_number_verified
 * @property string|null $phone_number
 * @property bool $active
 * @property string|null $business_profile_u_id
 * 
 * @property BusinessProfile|null $business_profile
 * @property Collection|BillingProfileTransaction[] $billing_profile_transactions_where_transfer_to_profile_id
 * @property Collection|BillingProfileTransaction[] $billing_profile_transactions_where_billing_profile_id
 *
 * @package App\Models\Base
 */
class BillingProfile extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const TYPE = 'type';
	const ACCOUNT_ID = 'account_id';
	const AMOUNT = 'amount';
	const CARD_NUMBER = 'card_number';
	const EXPIRY_DATE = 'expiry_date';
	const PHONE_NUMBER_VERIFIED = 'phone_number_verified';
	const PHONE_NUMBER = 'phone_number';
	const ACTIVE = 'active';
	const BUSINESS_PROFILE_U_ID = 'business_profile_u_id';
	protected $connection = 'mysql';
	protected $table = 'billing_profiles';

	protected $casts = [
		self::ID => 'int',
		self::AMOUNT => 'float',
		self::PHONE_NUMBER_VERIFIED => 'bool',
		self::ACTIVE => 'bool'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT,
		self::EXPIRY_DATE
	];

	public function business_profile(): BelongsTo
	{
		return $this->belongsTo(BusinessProfile::class, \App\Models\BillingProfile::BUSINESS_PROFILE_U_ID, BusinessProfile::U_ID);
	}

	public function billing_profile_transactions_where_transfer_to_profile_id(): HasMany
	{
		return $this->hasMany(BillingProfileTransaction::class, BillingProfileTransaction::TRANSFER_TO_PROFILE_ID, BillingProfileTransaction::U_ID);
	}

	public function billing_profile_transactions_where_billing_profile_id(): HasMany
	{
		return $this->hasMany(BillingProfileTransaction::class, BillingProfileTransaction::BILLING_PROFILE_ID, BillingProfileTransaction::U_ID);
	}
}
