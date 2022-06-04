<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Traits\FormatDates;
use App\Utils\BaseModel;

/**
 * Class Token
 * 
 * @property int $id
 * @property string|null $firebase_id
 * @property string $device_type
 * @property string $device_id
 *
 * @package App\Models\Base
 */
class Token extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const FIREBASE_ID = 'firebase_id';
	const DEVICE_TYPE = 'device_type';
	const DEVICE_ID = 'device_id';
	protected $connection = 'mysql';
	protected $table = 'tokens';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int'
	];
}
