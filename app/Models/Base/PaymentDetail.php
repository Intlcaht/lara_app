<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\Escrow;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PaymentDetail
 * 
 * @property int $id
 * @property string $u_id
 * @property string $escrow_u_id
 * @property string $billing_type
 * @property string|null $kra_pin_number
 * @property string|null $bank_holder_name
 * @property string|null $bank_account_number
 * @property string|null $bank_name
 * @property string|null $bank_branch_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $status
 * @property string|null $phone_number
 * 
 * @property Escrow $escrow
 *
 * @package App\Models\Base
 */
class PaymentDetail extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const ESCROW_U_ID = 'escrow_u_id';
	const BILLING_TYPE = 'billing_type';
	const KRA_PIN_NUMBER = 'kra_pin_number';
	const BANK_HOLDER_NAME = 'bank_holder_name';
	const BANK_ACCOUNT_NUMBER = 'bank_account_number';
	const BANK_NAME = 'bank_name';
	const BANK_BRANCH_NAME = 'bank_branch_name';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const STATUS = 'status';
	const PHONE_NUMBER = 'phone_number';
	protected $connection = 'mysql';
	protected $table = 'payment_details';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function escrow(): BelongsTo
	{
		return $this->belongsTo(Escrow::class, \App\Models\PaymentDetail::ESCROW_U_ID, Escrow::U_ID);
	}
}
