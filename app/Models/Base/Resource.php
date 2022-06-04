<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;

/**
 * Class Resource
 * 
 * @property int $id
 * @property string $name
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models\Base
 */
class Resource extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const NAME = 'name';
	const STATUS = 'status';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	protected $connection = 'mysql';
	protected $table = 'resources';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];
}
