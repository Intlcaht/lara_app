<?php

namespace App\Models;

use App\Models\Base\ProjectDataType as BaseProjectDataType;

class ProjectDataType extends BaseProjectDataType
{
	protected $fillable = [
		self::NAME,
		self::TAG,
		self::TYPE,
		self::VALUE,
		self::PROJECT_TASKSID,
		self::TAG_TYPESID
	];
}
