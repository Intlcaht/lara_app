<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CheckIn;
use App\Models\Earning;
use App\Models\Payment;
use App\Models\ProjectTask;
use App\Models\Rating;
use App\Models\User;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CheckinUser
 * 
 * @property int $id
 * @property string $u_id
 * @property string $check_in_u_id
 * @property string $user_u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property Carbon|null $checkout_time
 * @property string|null $checkout_description
 * @property int|null $estimated_completion_checkin_percentage
 * @property float|null $estimated_checkin_cost
 * @property string|null $estimated_completion_time_type
 * @property string|null $checkin_photo
 * @property string|null $rating_u_id
 * 
 * @property CheckIn $check_in
 * @property User $user
 * @property Rating|null $rating
 * @property Collection|Earning[] $earnings
 * @property Collection|Payment[] $payments
 * @property Collection|ProjectTask[] $project_tasks_where_check_out
 *
 * @package App\Models\Base
 */
class CheckinUser extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CHECK_IN_U_ID = 'check_in_u_id';
	const USER_U_ID = 'user_u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const CHECKOUT_TIME = 'checkout_time';
	const CHECKOUT_DESCRIPTION = 'checkout_description';
	const ESTIMATED_COMPLETION_CHECKIN_PERCENTAGE = 'estimated_completion_checkin_percentage';
	const ESTIMATED_CHECKIN_COST = 'estimated_checkin_cost';
	const ESTIMATED_COMPLETION_TIME_TYPE = 'estimated_completion_time_type';
	const CHECKIN_PHOTO = 'checkin_photo';
	const RATING_U_ID = 'rating_u_id';
	protected $connection = 'mysql';
	protected $table = 'checkin_users';

	protected $casts = [
		self::ID => 'int',
		self::ESTIMATED_COMPLETION_CHECKIN_PERCENTAGE => 'int',
		self::ESTIMATED_CHECKIN_COST => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT,
		self::CHECKOUT_TIME
	];

	public function check_in(): BelongsTo
	{
		return $this->belongsTo(CheckIn::class, \App\Models\CheckinUser::CHECK_IN_U_ID, CheckIn::U_ID);
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, \App\Models\CheckinUser::USER_U_ID, User::U_ID);
	}

	public function rating(): BelongsTo
	{
		return $this->belongsTo(Rating::class, \App\Models\CheckinUser::RATING_U_ID, Rating::U_ID);
	}

	public function earnings(): HasMany
	{
		return $this->hasMany(Earning::class, Earning::CHECKIN_USER_U_ID, Earning::U_ID);
	}

	public function payments(): HasMany
	{
		return $this->hasMany(Payment::class, Payment::CHECKIN_USER_U_ID, Payment::U_ID);
	}

	public function project_tasks_where_check_out(): HasMany
	{
		return $this->hasMany(ProjectTask::class, ProjectTask::CHECK_OUT_U_ID, ProjectTask::U_ID);
	}
}
