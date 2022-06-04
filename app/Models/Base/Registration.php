<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;

/**
 * Class Registration
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $email
 * @property bool $email_verified
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string $phone_number
 * @property string $first_name
 * @property string $last_name
 * @property string $initials
 *
 * @package App\Models\Base
 */
class Registration extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const EMAIL = 'email';
	const EMAIL_VERIFIED = 'email_verified';
	const EMAIL_VERIFIED_AT = 'email_verified_at';
	const PASSWORD = 'password';
	const PHONE_NUMBER = 'phone_number';
	const FIRST_NAME = 'first_name';
	const LAST_NAME = 'last_name';
	const INITIALS = 'initials';
	protected $connection = 'mysql';
	protected $table = 'registrations';

	protected $casts = [
		self::ID => 'int',
		self::EMAIL_VERIFIED => 'bool'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT,
		self::EMAIL_VERIFIED_AT
	];
}
