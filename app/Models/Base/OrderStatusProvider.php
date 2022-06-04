<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Chat;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderStatusBusinessProfile;
use App\Models\OrderStatusClient;
use App\Models\OrderStatusProviderPayment;
use App\Models\Payment;
use App\Models\ProjectTask;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class OrderStatusProvider
 * 
 * @property int $id
 * @property string $u_id
 * @property string $order_status_u_id
 * @property float|null $used_amount
 * @property float|null $estimated_complete_percentage_of_all_tasks
 * @property string|null $remarks_to_clients
 * @property string|null $remarks_to_providers
 * @property Carbon|null $completed_at
 * @property Carbon|null $started_at
 * @property string|null $complete_status_order_u_id
 * @property string|null $current_status_order_u_id
 * @property string|null $status_status
 * @property string|null $status_remarks
 * @property float|null $client_location_lat
 * @property float|null $client_location_long
 * @property float|null $bid_amount
 * 
 * @property OrderStatus $order_status
 * @property Order|null $complete_status_order
 * @property Order|null $current_status_order
 * @property Collection|Chat[] $chats
 * @property Collection|OrderStatusBusinessProfile[] $order_status_business_profiles_where_order_status_provider
 * @property Collection|OrderStatusClient[] $order_status_clients_where_order_status_user
 * @property Collection|Payment[] $payments
 * @property Collection|OrderStatus[] $order_statuses_where_bid_order_status_providers_u__id
 * @property Collection|ProjectTask[] $project_tasks_where_order_status_user
 *
 * @package App\Models\Base
 */
class OrderStatusProvider extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const U_ID = 'u_id';
	const ORDER_STATUS_U_ID = 'order_status_u_id';
	const USED_AMOUNT = 'used_amount';
	const ESTIMATED_COMPLETE_PERCENTAGE_OF_ALL_TASKS = 'estimated_complete_percentage_of_all_tasks';
	const REMARKS_TO_CLIENTS = 'remarks_to_clients';
	const REMARKS_TO_PROVIDERS = 'remarks_to_providers';
	const COMPLETED_AT = 'completed_at';
	const STARTED_AT = 'started_at';
	const COMPLETE_STATUS_ORDER_U_ID = 'complete_status_order_u_id';
	const CURRENT_STATUS_ORDER_U_ID = 'current_status_order_u_id';
	const STATUS_STATUS = 'status_status';
	const STATUS_REMARKS = 'status_remarks';
	const CLIENT_LOCATION_LAT = 'client_location_lat';
	const CLIENT_LOCATION_LONG = 'client_location_long';
	const BID_AMOUNT = 'bid_amount';
	protected $connection = 'mysql';
	protected $table = 'order_status_providers';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int',
		self::USED_AMOUNT => 'float',
		self::ESTIMATED_COMPLETE_PERCENTAGE_OF_ALL_TASKS => 'float',
		self::CLIENT_LOCATION_LAT => 'float',
		self::CLIENT_LOCATION_LONG => 'float',
		self::BID_AMOUNT => 'float'
	];

	protected $dates = [
		self::COMPLETED_AT,
		self::STARTED_AT
	];

	public function order_status(): BelongsTo
	{
		return $this->belongsTo(OrderStatus::class, OrderStatusProvider::ORDER_STATUS_U_ID, OrderStatus::U_ID);
	}

	public function complete_status_order(): BelongsTo
	{
		return $this->belongsTo(Order::class, OrderStatusProvider::COMPLETE_STATUS_ORDER_U_ID, Order::U_ID);
	}

	public function current_status_order(): BelongsTo
	{
		return $this->belongsTo(Order::class, OrderStatusProvider::CURRENT_STATUS_ORDER_U_ID, Order::U_ID);
	}

	public function chats(): HasMany
	{
		return $this->hasMany(Chat::class, Chat::ORDER_STATUS_PROVIDER_U_ID, Chat::U_ID);
	}

	public function order_status_business_profiles_where_order_status_provider(): HasMany
	{
		return $this->hasMany(OrderStatusBusinessProfile::class, OrderStatusBusinessProfile::ORDER_STATUS_PROVIDERS_U_ID, OrderStatusBusinessProfile::U_ID);
	}

	public function order_status_clients_where_order_status_user(): HasMany
	{
		return $this->hasMany(OrderStatusClient::class, OrderStatusClient::ORDER_STATUS_USER_U_ID, OrderStatusClient::U_ID);
	}

	public function payments(): BelongsToMany
	{
		return $this->belongsToMany(Payment::class, 'order_status_provider_payments', Payment::ORDER_STATUS_PROVIDER_U_ID, Payment::PAYMENT_U_ID)
					->withPivot(OrderStatusProviderPayment::ID);
	}

	public function order_statuses_where_bid_order_status_providers_u__id(): HasMany
	{
		return $this->hasMany(OrderStatus::class, OrderStatus::BID_ORDER_STATUS_PROVIDERS_U_ID, OrderStatus::U_ID);
	}

	public function project_tasks_where_order_status_user(): HasMany
	{
		return $this->hasMany(ProjectTask::class, ProjectTask::ORDER_STATUS_USERS_U_ID, ProjectTask::U_ID);
	}
}
