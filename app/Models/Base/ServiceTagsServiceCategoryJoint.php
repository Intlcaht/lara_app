<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\ServiceCategory;
use App\Models\ServiceTag;
use App\Traits\FormatDates;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ServiceTagsServiceCategoryJoint
 * 
 * @property int $id
 * @property string $tag_u_id
 * @property string $category_u_id
 * 
 * @property ServiceTag $tag
 * @property ServiceCategory $category
 *
 * @package App\Models\Base
 */
class ServiceTagsServiceCategoryJoint extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const TAG_U_ID = 'tag_u_id';
	const CATEGORY_U_ID = 'category_u_id';
	protected $connection = 'mysql';
	protected $table = 'service_tags_service_category_joint';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int'
	];

	public function tag(): BelongsTo
	{
		return $this->belongsTo(ServiceTag::class, ServiceTagsServiceCategoryJoint::TAG_U_ID, ServiceTag::U_ID);
	}

	public function category(): BelongsTo
	{
		return $this->belongsTo(ServiceCategory::class, ServiceTagsServiceCategoryJoint::CATEGORY_U_ID, ServiceCategory::U_ID);
	}
}
