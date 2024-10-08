<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Service;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Commission
 * 
 * @property int $id
 * @property string $u_id
 * @property string $name
 * @property string $commission_id
 * @property string|null $description
 * @property string $type
 * @property float $value
 * @property string $function_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $service_u_id
 * 
 * @property Service|null $service
 *
 * @package App\Models\Base
 */
class Commission extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const NAME = 'name';
	const COMMISSION_ID = 'commission_id';
	const DESCRIPTION = 'description';
	const TYPE = 'type';
	const VALUE = 'value';
	const FUNCTION_TYPE = 'function_type';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const SERVICE_U_ID = 'service_u_id';
	protected $connection = 'mysql';
	protected $table = 'commissions';

	protected $casts = [
		self::ID => 'int',
		self::VALUE => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function service(): BelongsTo
	{
		return $this->belongsTo(Service::class, \App\Models\Commission::SERVICE_U_ID, Service::U_ID);
	}
}
