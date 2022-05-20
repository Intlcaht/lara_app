<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\BusinessProfile;
use App\Models\User;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserBusinessProfile
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $user_u_id
 * @property string $profile_u_id
 * 
 * @property User $user
 * @property BusinessProfile $profile
 *
 * @package App\Models\Base
 */
class UserBusinessProfile extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const USER_U_ID = 'user_u_id';
	const PROFILE_U_ID = 'profile_u_id';
	protected $connection = 'mysql';
	protected $table = 'user_business_profiles';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, UserBusinessProfile::USER_U_ID, User::U_ID);
	}

	public function profile(): BelongsTo
	{
		return $this->belongsTo(BusinessProfile::class, UserBusinessProfile::PROFILE_U_ID, BusinessProfile::U_ID);
	}
}
