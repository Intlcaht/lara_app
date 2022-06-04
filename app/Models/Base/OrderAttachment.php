<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Order;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderAttachment
 * 
 * @property int $id
 * @property string $u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $order_u_id
 * @property string|null $type
 * @property string $name
 * @property string $url
 * 
 * @property Order|null $order
 *
 * @package App\Models\Base
 */
class OrderAttachment extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const ORDER_U_ID = 'order_u_id';
	const TYPE = 'type';
	const NAME = 'name';
	const URL = 'url';
	protected $connection = 'mysql';
	protected $table = 'order_attachments';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function order(): BelongsTo
	{
		return $this->belongsTo(Order::class, OrderAttachment::ORDER_U_ID, Order::U_ID);
	}
}
