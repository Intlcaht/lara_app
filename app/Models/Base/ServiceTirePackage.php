<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\Service;
use App\Models\ServicePackage;
use App\Models\ServiceTire;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceTirePackage
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $tire_u_id
 * @property string $package_u_id
 * @property string|null $service_u_id
 * @property string $value
 * 
 * @property ServiceTire $tire
 * @property ServicePackage $package
 * @property Service|null $service
 *
 * @package App\Models\Base
 */
class ServiceTirePackage extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const TIRE_U_ID = 'tire_u_id';
	const PACKAGE_U_ID = 'package_u_id';
	const SERVICE_U_ID = 'service_u_id';
	const VALUE = 'value';
	protected $connection = 'mysql';
	protected $table = 'service_tire_packages';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function tire(): BelongsTo
	{
		return $this->belongsTo(ServiceTire::class, ServiceTirePackage::TIRE_U_ID, ServiceTire::U_ID);
	}

	public function package(): BelongsTo
	{
		return $this->belongsTo(ServicePackage::class, ServiceTirePackage::PACKAGE_U_ID, ServicePackage::U_ID);
	}

	public function service(): BelongsTo
	{
		return $this->belongsTo(Service::class, ServiceTirePackage::SERVICE_U_ID, Service::U_ID);
	}
}
