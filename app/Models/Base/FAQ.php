<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\Service;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FAQ
 * 
 * @property int $id
 * @property string $u_id
 * @property string $tag
 * @property string $title
 * @property string $illustration
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $service_u_id
 * 
 * @property Service|null $service
 *
 * @package App\Models\Base
 */
class FAQ extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const TAG = 'tag';
	const TITLE = 'title';
	const ILLUSTRATION = 'illustration';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const SERVICE_U_ID = 'service_u_id';
	protected $connection = 'mysql';
	protected $table = 'f_a_qs';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function service(): BelongsTo
	{
		return $this->belongsTo(Service::class, \App\Models\FAQ::SERVICE_U_ID, Service::U_ID);
	}
}
