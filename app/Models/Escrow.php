<?php

namespace App\Models;

use App\Models\Base\Escrow as BaseEscrow;

class Escrow extends BaseEscrow
{
	protected $fillable = [
		self::U_ID,
		self::BALANCE
	];
}
