<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Traits\FormatDates;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class ServiceCategoryServiceJoint
 * 
 * @property int $id
 * @property string $u_id
 * @property string $category_u_id
 * @property string $service_u_id
 * 
 * @property ServiceCategory $category
 * @property Service $service
 *
 * @package App\Models\Base
 */
class ServiceCategoryServiceJoint extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CATEGORY_U_ID = 'category_u_id';
	const SERVICE_U_ID = 'service_u_id';
	protected $connection = 'mysql';
	protected $table = 'service_category_service_joint';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int'
	];

	public function category(): BelongsTo
	{
		return $this->belongsTo(ServiceCategory::class, ServiceCategoryServiceJoint::CATEGORY_U_ID, ServiceCategory::U_ID);
	}

	public function service(): BelongsTo
	{
		return $this->belongsTo(Service::class, ServiceCategoryServiceJoint::SERVICE_U_ID, Service::U_ID);
	}
}
