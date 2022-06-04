<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BlogComment;
use App\Models\BusinessProfile;
use App\Models\Chat;
use App\Models\CheckinUser;
use App\Models\OrderStatusClient;
use App\Models\ProjectsClient;
use App\Models\Role;
use App\Models\UserBusinessProfile;
use App\Models\UserProfile;
use App\Models\UserReview;
use App\Models\UserRole;
use App\Models\UsersRating;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property int $id
 * @property string $u_id
 * @property float|null $provider_location_lat
 * @property float|null $provider_location_long
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property Carbon|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property string $phone_number
 * @property string $status
 * @property string|null $otp
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $user_profile_u_id
 *
 * @property UserProfile $user_profile
 * @property Collection|BlogComment[] $blog_comments
 * @property Collection|Chat[] $chats_where_receiver
 * @property Collection|Chat[] $chats_where_sender
 * @property Collection|CheckinUser[] $checkin_users
 * @property Collection|OrderStatusClient[] $order_status_clients
 * @property Collection|ProjectsClient[] $projects_clients
 * @property Collection|BusinessProfile[] $business_profiles
 * @property Collection|UserReview[] $user_reviews
 * @property Collection|Role[] $roles
 * @property Collection|UsersRating[] $users_ratings_where_rate_by
 * @property Collection|UsersRating[] $users_ratings
 *
 * @package App\Models\Base
 */
class User extends Authenticatable
{
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const PROVIDER_LOCATION_LAT = 'provider_location_lat';
	const PROVIDER_LOCATION_LONG = 'provider_location_long';
	const EMAIL = 'email';
	const EMAIL_VERIFIED_AT = 'email_verified_at';
	const PASSWORD = 'password';
	const TWO_FACTOR_SECRET = 'two_factor_secret';
	const TWO_FACTOR_RECOVERY_CODES = 'two_factor_recovery_codes';
	const TWO_FACTOR_CONFIRMED_AT = 'two_factor_confirmed_at';
	const REMEMBER_TOKEN = 'remember_token';
	const PHONE_NUMBER = 'phone_number';
	const STATUS = 'status';
	const OTP = 'otp';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const USER_PROFILE_U_ID = 'user_profile_u_id';
	protected $connection = 'mysql';
	protected $table = 'users';

	protected $casts = [
		self::ID => 'int',
		self::PROVIDER_LOCATION_LAT => 'float',
		self::PROVIDER_LOCATION_LONG => 'float'
	];

	protected $dates = [
		self::EMAIL_VERIFIED_AT,
		self::TWO_FACTOR_CONFIRMED_AT,
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function user_profile(): BelongsTo
	{
		return $this->belongsTo(UserProfile::class, \App\Models\User::USER_PROFILE_U_ID, UserProfile::U_ID);
	}

	public function blog_comments(): HasMany
	{
		return $this->hasMany(BlogComment::class, BlogComment::USER_U_ID, BlogComment::U_ID);
	}

	public function chats_where_receiver(): HasMany
	{
		return $this->hasMany(Chat::class, Chat::RECEIVER_U_ID, Chat::U_ID);
	}

	public function chats_where_sender(): HasMany
	{
		return $this->hasMany(Chat::class, Chat::SENDER_U_ID, Chat::U_ID);
	}

	public function checkin_users(): HasMany
	{
		return $this->hasMany(CheckinUser::class, CheckinUser::USER_U_ID, CheckinUser::U_ID);
	}

	public function order_status_clients(): HasMany
	{
		return $this->hasMany(OrderStatusClient::class, OrderStatusClient::USER_U_ID, User::U_ID);
	}

	public function projects_clients(): HasMany
	{
		return $this->hasMany(ProjectsClient::class, ProjectsClient::USER_U_ID, User::U_ID);
	}

	public function business_profiles(): BelongsToMany
	{
		return $this->belongsToMany(BusinessProfile::class, 'user_business_profiles', UserBusinessProfile::USER_U_ID, UserBusinessProfile::PROFILE_U_ID)
					->withPivot(UserBusinessProfile::ID, UserBusinessProfile::U_ID, UserBusinessProfile::DELETED_AT)
					->withTimestamps();
	}

	public function user_reviews(): HasMany
	{
		return $this->hasMany(UserReview::class, UserReview::USER_U_ID, UserReview::U_ID);
	}

	public function users_ratings_where_rate_by(): HasMany
	{
		return $this->hasMany(UsersRating::class, UsersRating::RATE_BY_U_ID, UsersRating::U_ID);
	}

	public function users_ratings(): HasMany
	{
		return $this->hasMany(UsersRating::class, UsersRating::USER_U_ID, UsersRating::U_ID);
	}
}
