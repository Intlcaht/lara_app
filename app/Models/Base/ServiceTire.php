<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Service;
use App\Models\ServiceTirePackage;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceTire
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $service_u_id
 * @property string $title
 * @property string|null $description
 * 
 * @property Service|null $service
 * @property Collection|ServiceTirePackage[] $service_tire_packages_where_tire
 *
 * @package App\Models\Base
 */
class ServiceTire extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const SERVICE_U_ID = 'service_u_id';
	const TITLE = 'title';
	const DESCRIPTION = 'description';
	protected $connection = 'mysql';
	protected $table = 'service_tires';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function service(): BelongsTo
	{
		return $this->belongsTo(Service::class, ServiceTire::SERVICE_U_ID, Service::U_ID);
	}

	public function service_tire_packages_where_tire(): HasMany
	{
		return $this->hasMany(ServiceTirePackage::class, ServiceTirePackage::TIRE_U_ID, ServiceTirePackage::U_ID);
	}
}
