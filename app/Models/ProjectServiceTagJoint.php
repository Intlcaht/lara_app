<?php

namespace App\Models;

use App\Models\Base\ProjectServiceTagJoint as BaseProjectServiceTagJoint;

class ProjectServiceTagJoint extends BaseProjectServiceTagJoint
{
	protected $fillable = [
		self::DESCRIPTION,
		self::TAG_U_ID,
		self::PROJECT_U_ID
	];
}
