<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BusinessProfile;
use App\Models\ServiceTag;
use App\Models\ServiceTagsBusinessProfileJointDuration;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ServiceTagsBusinessProfileJoint
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $tag_u_id
 * @property string $profile_u_id
 * @property float $rate_amount
 * @property string $rate_type
 * @property string|null $privacy_policy
 * 
 * @property ServiceTag $tag
 * @property BusinessProfile $profile
 * @property Collection|ServiceTagsBusinessProfileJointDuration[] $service_tags_business_profile_joint_durations
 *
 * @package App\Models\Base
 */
class ServiceTagsBusinessProfileJoint extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const TAG_U_ID = 'tag_u_id';
	const PROFILE_U_ID = 'profile_u_id';
	const RATE_AMOUNT = 'rate_amount';
	const RATE_TYPE = 'rate_type';
	const PRIVACY_POLICY = 'privacy_policy';
	protected $connection = 'mysql';
	protected $table = 'service_tags_business_profile_joint';

	protected $casts = [
		self::ID => 'int',
		self::RATE_AMOUNT => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function tag(): BelongsTo
	{
		return $this->belongsTo(ServiceTag::class, ServiceTagsBusinessProfileJoint::TAG_U_ID, ServiceTag::U_ID);
	}

	public function profile(): BelongsTo
	{
		return $this->belongsTo(BusinessProfile::class, ServiceTagsBusinessProfileJoint::PROFILE_U_ID, BusinessProfile::U_ID);
	}

	public function service_tags_business_profile_joint_durations(): HasMany
	{
		return $this->hasMany(ServiceTagsBusinessProfileJointDuration::class, ServiceTagsBusinessProfileJointDuration::SERVICE_TAGS_BUSINESS_PROFILE_JOINT_U_ID, ServiceTagsBusinessProfileJointDuration::U_ID);
	}
}
