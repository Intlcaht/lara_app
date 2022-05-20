<?php

namespace App\Models;

use App\Models\Base\BlogComment as BaseBlogComment;

class BlogComment extends BaseBlogComment
{
	protected $fillable = [
		self::U_ID,
		self::USER_U_ID,
		self::BLOG_U_ID,
		self::COMMENT,
		self::PARENT_BLOG_COMMENT_U_ID
	];
}
