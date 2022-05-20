<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\BaseModel;
use App\Models\CheckIn;
use App\Models\User;
use App\Traits\FormatDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Chat
 * 
 * @property int $id
 * @property string $u_id
 * @property string|null $check_in_u_id
 * @property string|null $message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $sender_u_id
 * @property string|null $receiver_u_id
 * @property string|null $attachment_url
 * @property string $attachment_type
 * @property string|null $parent_chat_u_id
 * @property string $delivery_status
 * 
 * @property CheckIn|null $check_in
 * @property User|null $receiver
 * @property User $sender
 * @property \App\Models\Chat|null $parent_chat
 * @property Collection|\App\Models\Chat[] $chats_where_parent_chat
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
	const MESSAGE = 'message';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const SENDER_U_ID = 'sender_u_id';
	const RECEIVER_U_ID = 'receiver_u_id';
	const ATTACHMENT_URL = 'attachment_url';
	const ATTACHMENT_TYPE = 'attachment_type';
	const PARENT_CHAT_U_ID = 'parent_chat_u_id';
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

	public function receiver(): BelongsTo
	{
		return $this->belongsTo(User::class, \App\Models\Chat::RECEIVER_U_ID, User::U_ID);
	}

	public function sender(): BelongsTo
	{
		return $this->belongsTo(User::class, \App\Models\Chat::SENDER_U_ID, User::U_ID);
	}

	public function parent_chat(): BelongsTo
	{
		return $this->belongsTo(\App\Models\Chat::class, \App\Models\Chat::PARENT_CHAT_U_ID, \App\Models\Chat::U_ID);
	}

	public function chats_where_parent_chat(): HasMany
	{
		return $this->hasMany(\App\Models\Chat::class, \App\Models\Chat::PARENT_CHAT_U_ID, \App\Models\Chat::U_ID);
	}
}
