<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\User;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserRole
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property string $usertype
 * @property string|null $user_u_id
 * 
 * @property User|null $user
 *
 * @package App\Models\Base
 */
class UserRole extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const CREATED_AT = 'created_at';
	const USERTYPE = 'usertype';
	const USER_U_ID = 'user_u_id';
	protected $connection = 'mysql';
	protected $table = 'user_roles';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, UserRole::USER_U_ID, User::U_ID);
	}
}
