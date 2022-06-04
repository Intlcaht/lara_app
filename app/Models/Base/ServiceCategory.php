<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Service;
use App\Models\ServiceCategoryServiceJoint;
use App\Models\ServiceTag;
use App\Models\ServiceTagsServiceCategoryJoint;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceCategory
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $title
 * @property string $description
 * @property string $tagline
 * @property string|null $parent_category_u_id
 * 
 * @property ServiceCategory|null $parent_category
 * @property Collection|ServiceCategory[] $service_categories_where_parent_category
 * @property Collection|Service[] $services
 * @property Collection|ServiceTag[] $service_tags
 *
 * @package App\Models\Base
 */
class ServiceCategory extends BaseModel
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
	const TAGLINE = 'tagline';
	const PARENT_CATEGORY_U_ID = 'parent_category_u_id';
	protected $connection = 'mysql';
	protected $table = 'service_category';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function parent_category(): BelongsTo
	{
		return $this->belongsTo(ServiceCategory::class, ServiceCategory::PARENT_CATEGORY_U_ID, ServiceCategory::U_ID);
	}

	public function service_categories_where_parent_category(): HasMany
	{
		return $this->hasMany(ServiceCategory::class, ServiceCategory::PARENT_CATEGORY_U_ID, ServiceCategory::U_ID);
	}

	public function services(): BelongsToMany
	{
		return $this->belongsToMany(Service::class, 'service_category_service_joint', Service::CATEGORY_U_ID, Service::SERVICE_U_ID)
					->withPivot(ServiceCategoryServiceJoint::ID, ServiceCategoryServiceJoint::U_ID);
	}

	public function service_tags(): BelongsToMany
	{
		return $this->belongsToMany(ServiceTag::class, 'service_tags_service_category_joint', ServiceTag::CATEGORY_U_ID, ServiceTag::TAG_U_ID)
					->withPivot(ServiceTagsServiceCategoryJoint::ID);
	}
}
