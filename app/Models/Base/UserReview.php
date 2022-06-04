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
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserReview
 * 
 * @property int $id
 * @property string $uId
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $illustration
 * @property string|null $photo_url
 * @property string|null $user_u_id
 * @property int|null $parent_reviewId
 * @property int $upvotes
 * @property string $status
 * 
 * @property User|null $user
 * @property UserReview|null $parent_review_id
 * @property Collection|UserReview[] $user_reviews_where_parent_review_id
 *
 * @package App\Models\Base
 */
class UserReview extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'uId';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const ILLUSTRATION = 'illustration';
	const PHOTO_URL = 'photo_url';
	const USER_U_ID = 'user_u_id';
	const PARENT_REVIEW_ID = 'parent_reviewId';
	const UPVOTES = 'upvotes';
	const STATUS = 'status';
	protected $connection = 'mysql';
	protected $table = 'user_reviews';

	protected $casts = [
		self::ID => 'int',
		self::PARENT_REVIEWID => 'int',
		self::UPVOTES => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, UserReview::USER_U_ID, User::U_ID);
	}

	public function parent_review_id(): BelongsTo
	{
		return $this->belongsTo(UserReview::class, UserReview::PARENT_REVIEWID);
	}

	public function user_reviews_where_parent_review_id(): HasMany
	{
		return $this->hasMany(UserReview::class, UserReview::PARENT_REVIEWID);
	}
}
