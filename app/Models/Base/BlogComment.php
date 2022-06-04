<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Blog;
use App\Models\User;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogComment
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $user_u_id
 * @property string|null $blog_u_id
 * @property string $comment
 * @property string|null $parent_blog_comment_u_id
 * 
 * @property User $user
 * @property Blog|null $blog
 * @property BlogComment|null $parent_blog_comment
 * @property Collection|BlogComment[] $blog_comments_where_parent_blog_comment
 *
 * @package App\Models\Base
 */
class BlogComment extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const USER_U_ID = 'user_u_id';
	const BLOG_U_ID = 'blog_u_id';
	const COMMENT = 'comment';
	const PARENT_BLOG_COMMENT_U_ID = 'parent_blog_comment_u_id';
	protected $connection = 'mysql';
	protected $table = 'blog_comments';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, BlogComment::USER_U_ID, User::U_ID);
	}

	public function blog(): BelongsTo
	{
		return $this->belongsTo(Blog::class, BlogComment::BLOG_U_ID, Blog::U_ID);
	}

	public function parent_blog_comment(): BelongsTo
	{
		return $this->belongsTo(BlogComment::class, BlogComment::PARENT_BLOG_COMMENT_U_ID, BlogComment::U_ID);
	}

	public function blog_comments_where_parent_blog_comment(): HasMany
	{
		return $this->hasMany(BlogComment::class, BlogComment::PARENT_BLOG_COMMENT_U_ID, BlogComment::U_ID);
	}
}
