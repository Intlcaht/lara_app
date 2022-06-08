<?php

namespace App\Models;

use App\Models\Base\UserReview as BaseUserReview;

class UserReview extends BaseUserReview
{
	protected $fillable = [
		self::U_ID,
		self::ILLUSTRATION,
		self::PHOTO_URL,
		self::USER_U_ID,
		self::PARENT_REVIEW_ID,
		self::UPVOTES,
		self::STATUS
	];
}
