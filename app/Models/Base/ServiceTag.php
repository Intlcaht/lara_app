<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Blog;
use App\Models\BusinessProfile;
use App\Models\CheckIn;
use App\Models\Project;
use App\Models\ProjectServiceTagJoint;
use App\Models\ServiceCategory;
use App\Models\ServiceTagCheckIn;
use App\Models\ServiceTagsBlogsJoint;
use App\Models\ServiceTagsBusinessProfileJoint;
use App\Models\ServiceTagsNotificationsJoint;
use App\Models\ServiceTagsServiceCategoryJoint;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceTag
 *
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $title
 * @property string|null $description
 *
 * @property Collection|Project[] $projects
 * @property Collection|CheckIn[] $check_ins
 * @property Collection|Blog[] $blogs
 * @property Collection|BusinessProfile[] $business_profiles
 * @property Collection|ServiceTagsNotificationsJoint[] $service_tags_notifications_joints
 * @property Collection|ServiceCategory[] $service_categories
 *
 * @package App\Models\Base
 */
class ServiceTag extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const TITLE = 'title';
	const DESCRIPTION = 'description';
	protected $connection = 'mysql';
	protected $table = 'service_tags';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function projects(): BelongsToMany
	{
		return $this->belongsToMany(Project::class, 'project_service_tag_joint', ProjectServiceTagJoint::TAG_U_ID, ProjectServiceTagJoint::PROJECT_U_ID)
					->withPivot(ProjectServiceTagJoint::ID, ProjectServiceTagJoint::DESCRIPTION, ProjectServiceTagJoint::DELETED_AT)
					->withTimestamps();
	}

	public function check_ins(): BelongsToMany
	{
		return $this->belongsToMany(CheckIn::class, 'service_tag_check_in', ServiceTagCheckIn::SERVICE_TAG_U_ID, ServiceTagCheckIn::CHECK_IN_U_ID)
					->withPivot(ServiceTagCheckIn::ID, ServiceTagCheckIn::U_ID, ServiceTagCheckIn::DELETED_AT)
					->withTimestamps();
	}

	public function blogs(): BelongsToMany
	{
		return $this->belongsToMany(Blog::class, 'service_tags_blogs_joint', ServiceTagsBlogsJoint::SERVICE_TAG_U_ID, ServiceTagsBlogsJoint::BLOG_U_ID)
					->withPivot(ServiceTagsBlogsJoint::ID, ServiceTagsBlogsJoint::DELETED_AT)
					->withTimestamps();
	}

	public function business_profiles(): BelongsToMany
	{
		return $this->belongsToMany(BusinessProfile::class, 'service_tags_business_profile_joint', ServiceTagsBusinessProfileJoint::TAG_U_ID, ServiceTagsBusinessProfileJoint::PROFILE_U_ID)
					->withPivot(ServiceTagsBusinessProfileJoint::ID, ServiceTagsBusinessProfileJoint::U_ID, ServiceTagsBusinessProfileJoint::DELETED_AT, ServiceTagsBusinessProfileJoint::RATE_AMOUNT, ServiceTagsBusinessProfileJoint::RATE_TYPE, ServiceTagsBusinessProfileJoint::PRIVACY_POLICY)
					->withTimestamps();
	}

	public function service_tags_notifications_joints(): HasMany
	{
		return $this->hasMany(ServiceTagsNotificationsJoint::class, ServiceTagsNotificationsJoint::SERVICE_TAG_U_ID, ServiceTagsNotificationsJoint::U_ID);
	}

	public function service_categories(): BelongsToMany
	{
		return $this->belongsToMany(ServiceCategory::class, 'service_tags_service_category_joint', ServiceTagsServiceCategoryJoint::TAG_U_ID, ServiceTagsServiceCategoryJoint::CATEGORY_U_ID)
					->withPivot(ServiceTagsServiceCategoryJoint::ID);
	}
}
