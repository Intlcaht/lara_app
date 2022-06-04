<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CheckinUser;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Rating
 * 
 * @property int $id
 * @property string $u_id
 * 
 * @property Collection|CheckinUser[] $checkin_users
 *
 * @package App\Models\Base
 */
class Rating extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	protected $connection = 'mysql';
	protected $table = 'ratings';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int'
	];

	public function checkin_users(): HasMany
	{
		return $this->hasMany(CheckinUser::class, CheckinUser::RATING_U_ID, CheckinUser::U_ID);
	}
}
