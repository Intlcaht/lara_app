<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CheckIn;
use App\Models\OrderStatusProvider;
use App\Models\User;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Chat
 * 
 * @property int $id
 * @property string $u_id
 * @property string|null $check_in_u_id
 * @property string|null $order_status_provider_u_id
 * @property string|null $message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $sender_u_id
 * @property string|null $receiver_u_id
 * @property string|null $attachment_url
 * @property string $attachment_type
 * @property string $delivery_status
 * 
 * @property CheckIn|null $check_in
 * @property OrderStatusProvider|null $order_status_provider
 * @property User|null $receiver
 * @property User $sender
 *
 * @package App\Models\Base
 */
class Chat extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const CHECK_IN_U_ID = 'check_in_u_id';
	const ORDER_STATUS_PROVIDER_U_ID = 'order_status_provider_u_id';
	const MESSAGE = 'message';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const SENDER_U_ID = 'sender_u_id';
	const RECEIVER_U_ID = 'receiver_u_id';
	const ATTACHMENT_URL = 'attachment_url';
	const ATTACHMENT_TYPE = 'attachment_type';
	const DELIVERY_STATUS = 'delivery_status';
	protected $connection = 'mysql';
	protected $table = 'chats';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function check_in(): BelongsTo
	{
		return $this->belongsTo(CheckIn::class, \App\Models\Chat::CHECK_IN_U_ID, CheckIn::U_ID);
	}

	public function order_status_provider(): BelongsTo
	{
		return $this->belongsTo(OrderStatusProvider::class, \App\Models\Chat::ORDER_STATUS_PROVIDER_U_ID, OrderStatusProvider::U_ID);
	}

	public function receiver(): BelongsTo
	{
		return $this->belongsTo(User::class, \App\Models\Chat::RECEIVER_U_ID, User::U_ID);
	}

	public function sender(): BelongsTo
	{
		return $this->belongsTo(User::class, \App\Models\Chat::SENDER_U_ID, User::U_ID);
	}
}
