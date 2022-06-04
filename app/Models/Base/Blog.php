<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BlogComment;
use App\Models\BusinessProfile;
use App\Models\ServiceTag;
use App\Models\ServiceTagsBlogsJoint;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Blog
 *
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $business_profile_u_id
 * @property string $title
 * @property string $slug
 * @property string $article
 * @property float $estimated_read_time
 *
 * @property BusinessProfile|null $business_profile
 * @property Collection|BlogComment[] $blog_comments
 * @property Collection|ServiceTag[] $service_tags
 *
 * @package App\Models\Base
 */
class Blog extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const BUSINESS_PROFILE_U_ID = 'business_profile_u_id';
	const TITLE = 'title';
	const SLUG = 'slug';
	const ARTICLE = 'article';
	const ESTIMATED_READ_TIME = 'estimated_read_time';
	protected $connection = 'mysql';
	protected $table = 'blogs';

	protected $casts = [
		self::ID => 'int',
		self::ESTIMATED_READ_TIME => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function business_profile(): BelongsTo
	{
		return $this->belongsTo(BusinessProfile::class, \App\Models\Blog::BUSINESS_PROFILE_U_ID, BusinessProfile::U_ID);
	}

	public function blog_comments(): HasMany
	{
		return $this->hasMany(BlogComment::class, BlogComment::BLOG_U_ID, BlogComment::U_ID);
	}

	public function service_tags(): BelongsToMany
	{
		return $this->belongsToMany(ServiceTag::class, 'service_tags_blogs_joint', ServiceTagsBlogsJoint::BLOG_U_ID, ServiceTagsBlogsJoint::SERVICE_TAG_U_ID)
					->withPivot(ServiceTagsBlogsJoint::ID, ServiceTagsBlogsJoint::DELETED_AT)
					->withTimestamps();
	}
}
