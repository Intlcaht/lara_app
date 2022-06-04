<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\OrderStatusProvider;
use App\Models\User;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class OrderStatusClient
 * 
 * @property int $id
 * @property string $user_u_id
 * @property string $order_status_user_u_id
 * 
 * @property User $user
 * @property OrderStatusProvider $order_status_user
 *
 * @package App\Models\Base
 */
class OrderStatusClient extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const USER_U_ID = 'user_u_id';
	const ORDER_STATUS_USER_U_ID = 'order_status_user_u_id';
	protected $connection = 'mysql';
	protected $table = 'order_status_clients';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int'
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class, \App\Models\OrderStatusClient::USER_U_ID, User::U_ID);
	}

	public function order_status_user(): BelongsTo
	{
		return $this->belongsTo(OrderStatusProvider::class, \App\Models\OrderStatusClient::ORDER_STATUS_USER_U_ID, OrderStatusProvider::U_ID);
	}
}
