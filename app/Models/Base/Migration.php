<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Traits\FormatDates;

/**
 * Class Migration
 * 
 * @property int $id
 * @property string $migration
 * @property int $batch
 *
 * @package App\Models\Base
 */
class Migration extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const MIGRATION = 'migration';
	const BATCH = 'batch';
	protected $connection = 'mysql';
	protected $table = 'migrations';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int',
		self::BATCH => 'int'
	];
}
