<?php

namespace App\Models;

use App\Models\Base\Migration as BaseMigration;

class Migration extends BaseMigration
{
	protected $fillable = [
		self::MIGRATION,
		self::BATCH
	];
}
