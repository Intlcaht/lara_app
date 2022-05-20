<?php

namespace App\Models;

use App\Models\Base\ProjectsClient as BaseProjectsClient;

class ProjectsClient extends BaseProjectsClient
{
	protected $fillable = [
		self::PROJECT_U_ID,
		self::USER_U_IID,
		self::USER_TYPE,
		self::STATUS
	];
}
