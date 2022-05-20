<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\User;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UsersRating
 * 
 * @property int $id
 * @property string $u_id
 * @property string $rate_by_u_id
 * @property float $rating
 * @property string $comment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $user_u_id
 * 
 * @property User $rate_by
 * @property User $user
 *
 * @package App\Models\Base
 */
class UsersRating extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const RATE_BY_U_ID = 'rate_by_u_id';
	const RATING = 'rating';
	const COMMENT = 'comment';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const USER_U_ID = 'user_u_id';
	protected $connection = 'mysql';
	protected $table = 'users_ratings';

	protected $casts = [
		self::ID => 'int',
		self::RATING => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function rate_by(): BelongsTo
	{
		return $this->belongsTo(User::class, UsersRating::RATE_BY_U_ID, User::U_ID);
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, UsersRating::USER_U_ID, User::U_ID);
	}
}
