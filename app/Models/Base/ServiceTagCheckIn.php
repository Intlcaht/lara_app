<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\CheckIn;
use App\Models\ServiceTag;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceTagCheckIn
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $service_tag_u_id
 * @property string $check_in_u_id
 * 
 * @property ServiceTag $service_tag
 * @property CheckIn $check_in
 *
 * @package App\Models\Base
 */
class ServiceTagCheckIn extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const SERVICE_TAG_U_ID = 'service_tag_u_id';
	const CHECK_IN_U_ID = 'check_in_u_id';
	protected $connection = 'mysql';
	protected $table = 'service_tag_check_in';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function service_tag(): BelongsTo
	{
		return $this->belongsTo(ServiceTag::class, ServiceTagCheckIn::SERVICE_TAG_U_ID, ServiceTag::U_ID);
	}

	public function check_in(): BelongsTo
	{
		return $this->belongsTo(CheckIn::class, ServiceTagCheckIn::CHECK_IN_U_ID, CheckIn::U_ID);
	}
}
