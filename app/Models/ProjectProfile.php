<?php

namespace App\Models;

use App\Models\Base\ProjectProfile as BaseProjectProfile;

class ProjectProfile extends BaseProjectProfile
{
	protected $fillable = [
		self::U_ID,
		self::DESCRIPTION
	];
}
