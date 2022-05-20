<?php

namespace App\Models;

use App\Models\Base\ProjectStatusLabel as BaseProjectStatusLabel;

class ProjectStatusLabel extends BaseProjectStatusLabel
{
	protected $fillable = [
		self::LABELS
	];
}
