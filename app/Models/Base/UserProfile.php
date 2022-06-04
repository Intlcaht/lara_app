<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\User;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class UserProfile
 * 
 * @property int $id
 * @property string $u_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $profile_photo_path
 * @property string|null $national_id
 * @property string|null $address
 * @property string|null $county
 * @property string|null $photo_url
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string $initials
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models\Base
 */
class UserProfile extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const FIRST_NAME = 'first_name';
	const LAST_NAME = 'last_name';
	const PROFILE_PHOTO_PATH = 'profile_photo_path';
	const NATIONAL_ID = 'national_id';
	const ADDRESS = 'address';
	const COUNTY = 'county';
	const PHOTO_URL = 'photo_url';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const INITIALS = 'initials';
	protected $connection = 'mysql';
	protected $table = 'user_profiles';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function users(): HasMany
	{
		return $this->hasMany(User::class, User::USER_PROFILE_U_ID, User::U_ID);
	}
}
