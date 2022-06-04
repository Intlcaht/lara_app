<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\OrderStatusProvider;
use App\Models\Payment;
use App\Traits\FormatDates;
use App\Utils\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class OrderStatusProviderPayment
 * 
 * @property int $id
 * @property string|null $order_status_provider_u_id
 * @property string|null $payment_u_id
 * 
 * @property OrderStatusProvider|null $order_status_provider
 * @property Payment|null $payment
 *
 * @package App\Models\Base
 */
class OrderStatusProviderPayment extends BaseModel
{
	use FormatDates;
	const ID = 'id';
	const ORDER_STATUS_PROVIDER_U_ID = 'order_status_provider_u_id';
	const PAYMENT_U_ID = 'payment_u_id';
	protected $connection = 'mysql';
	protected $table = 'order_status_provider_payments';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int'
	];

	public function order_status_provider(): BelongsTo
	{
		return $this->belongsTo(OrderStatusProvider::class, OrderStatusProviderPayment::ORDER_STATUS_PROVIDER_U_ID, OrderStatusProvider::U_ID);
	}

	public function payment(): BelongsTo
	{
		return $this->belongsTo(Payment::class, OrderStatusProviderPayment::PAYMENT_U_ID, Payment::U_ID);
	}
}
