<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\Project;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Location
 * 
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property float $latitude
 * @property float $longitude
 * @property string $u_id
 * 
 * @property Collection|Project[] $projects_where_locations_id
 *
 * @package App\Models\Base
 */
class Location extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const NAME = 'name';
	const DESCRIPTION = 'description';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const LATITUDE = 'latitude';
	const LONGITUDE = 'longitude';
	const U_ID = 'u_id';
	protected $connection = 'mysql';
	protected $table = 'locations';

	protected $casts = [
		self::ID => 'int',
		self::LATITUDE => 'float',
		self::LONGITUDE => 'float'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function projects_where_locations_id(): HasMany
	{
		return $this->hasMany(Project::class, Project::LOCATIONSID);
	}
}
