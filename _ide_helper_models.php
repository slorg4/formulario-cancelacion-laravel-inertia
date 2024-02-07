<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Client
 *
 * @method static \Illuminate\Database\Query\Builder|Client select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Client create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Client firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Client firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Client where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Email
 *
 * @method static \Illuminate\Database\Query\Builder|Email select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Email create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Email firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Email firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Email where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $is_cancel_type
 * @method static \Illuminate\Database\Eloquent\Builder|Email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Email query()
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereIsCancelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Email whereUpdatedAt($value)
 */
	class Email extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Invoice
 *
 * @method static \Illuminate\Database\Query\Builder|Invoice select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @property int $id
 * @property int $name
 * @property int $invoice_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $invoice_date
 * @property string $total_price_amount
 * @property string $material
 * @property int $client_id
 * @property-read \App\Models\Client|null $client
 * @property-read \App\Models\InvoiceType $invoiceType
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereInvoiceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereInvoiceTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereMaterial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereTotalPriceAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUpdatedAt($value)
 */
	class Invoice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\InvoiceType
 *
 * @method static \Illuminate\Database\Query\Builder|InvoiceType select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType query()
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType whereUpdatedAt($value)
 */
	class InvoiceType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OperationType
 *
 * @method static \Illuminate\Database\Query\Builder|OperationType select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType whereUpdatedAt($value)
 */
	class OperationType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Partner
 *
 * @method static \Illuminate\Database\Query\Builder|Partner select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Partner create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Partner firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Partner firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Partner where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereUpdatedAt($value)
 */
	class Partner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RefundOperation
 *
 * @method static \Illuminate\Database\Query\Builder|RefundOperation select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @property int $id
 * @property int $partner_id
 * @property int $old_invoice_id
 * @property int|null $new_invoice_id
 * @property int $operation_type_id
 * @property string $reason
 * @property string $authorized_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Invoice|null $newInvoice
 * @property-read \App\Models\Invoice $oldInvoice
 * @property-read \App\Models\OperationType $operationType
 * @property-read \App\Models\Partner $partner
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation query()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation whereAuthorizedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation whereNewInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation whereOldInvoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation whereOperationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation wherePartnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation whereUpdatedAt($value)
 */
	class RefundOperation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @method static \Illuminate\Database\Query\Builder|User select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|User create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

