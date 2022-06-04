<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\OrderStatusProvider;
use App\Models\Service;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderStatus
 * 
 * @property int $id
 * @property string $u_id
 * @property string $status
 * @property string|null $description
 * @property string $services_u_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $next_order_status_u_id
 * @property bool $client_collaboration_allowed
 * @property string $status_command
 * @property bool $requires_client_location
 * @property string|null $bid_order_status_providers_u_Id
 * 
 * @property Service $services
 * @property \App\Models\OrderStatus|null $next_order_status
 * @property OrderStatusProvider|null $bid_order_status_providers_u__id
 * @property Collection|OrderStatusProvider[] $order_status_providers
 * @property Collection|\App\Models\OrderStatus[] $order_statuses_where_next_order_status
 *
 * @package App\Models\Base
 */
class OrderStatus extends BaseModel
{
	use SoftDeletes;
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const STATUS = 'status';
	const DESCRIPTION = 'description';
	const SERVICES_U_ID = 'services_u_id';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	const DELETED_AT = 'deleted_at';
	const NEXT_ORDER_STATUS_U_ID = 'next_order_status_u_id';
	const CLIENT_COLLABORATION_ALLOWED = 'client_collaboration_allowed';
	const STATUS_COMMAND = 'status_command';
	const REQUIRES_CLIENT_LOCATION = 'requires_client_location';
	const BID_ORDER_STATUS_PROVIDERS_U__ID = 'bid_order_status_providers_u_Id';
	protected $connection = 'mysql';
	protected $table = 'order_statuses';

	protected $casts = [
		self::ID => 'int',
		self::CLIENT_COLLABORATION_ALLOWED => 'bool',
		self::REQUIRES_CLIENT_LOCATION => 'bool'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	public function services(): BelongsTo
	{
		return $this->belongsTo(Service::class, \App\Models\OrderStatus::SERVICES_U_ID, Service::U_ID);
	}

	public function next_order_status(): BelongsTo
	{
		return $this->belongsTo(\App\Models\OrderStatus::class, \App\Models\OrderStatus::NEXT_ORDER_STATUS_U_ID, \App\Models\OrderStatus::U_ID);
	}

	public function bid_order_status_providers_u__id(): BelongsTo
	{
		return $this->belongsTo(OrderStatusProvider::class, \App\Models\OrderStatus::BID_ORDER_STATUS_PROVIDERS_U_ID, OrderStatusProvider::U_ID);
	}

	public function order_status_providers(): HasMany
	{
		return $this->hasMany(OrderStatusProvider::class, OrderStatusProvider::ORDER_STATUS_U_ID, OrderStatusProvider::U_ID);
	}

	public function order_statuses_where_next_order_status(): HasMany
	{
		return $this->hasMany(\App\Models\OrderStatus::class, \App\Models\OrderStatus::NEXT_ORDER_STATUS_U_ID, \App\Models\OrderStatus::U_ID);
	}
}
