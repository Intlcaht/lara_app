<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\BusinessProfile;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BusinessAttachment
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $type
 * @property string $name
 * @property string $url
 * @property string|null $business_profile_u_id
 * 
 * @property BusinessProfile|null $business_profile
 *
 * @package App\Models\Base
 */
class BusinessAttachment extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const TYPE = 'type';
	const NAME = 'name';
	const URL = 'url';
	const BUSINESS_PROFILE_U_ID = 'business_profile_u_id';
	protected $connection = 'mysql';
	protected $table = 'business_attachments';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function business_profile(): BelongsTo
	{
		return $this->belongsTo(BusinessProfile::class, \App\Models\BusinessAttachment::BUSINESS_PROFILE_U_ID, BusinessProfile::U_ID);
	}
}
