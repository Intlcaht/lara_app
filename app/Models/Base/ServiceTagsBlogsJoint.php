<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Blog;
use App\Models\ServiceTag;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceTagsBlogsJoint
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $service_tag_u_id
 * @property string $blog_u_id
 * 
 * @property ServiceTag $service_tag
 * @property Blog $blog
 *
 * @package App\Models\Base
 */
class ServiceTagsBlogsJoint extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const SERVICE_TAG_U_ID = 'service_tag_u_id';
	const BLOG_U_ID = 'blog_u_id';
	protected $connection = 'mysql';
	protected $table = 'service_tags_blogs_joint';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function service_tag(): BelongsTo
	{
		return $this->belongsTo(ServiceTag::class, ServiceTagsBlogsJoint::SERVICE_TAG_U_ID, ServiceTag::U_ID);
	}

	public function blog(): BelongsTo
	{
		return $this->belongsTo(Blog::class, ServiceTagsBlogsJoint::BLOG_U_ID, Blog::U_ID);
	}
}
