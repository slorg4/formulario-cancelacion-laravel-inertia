<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static \Illuminate\Database\Query\Builder|Invoice select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 */
class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'invoice_type_id',
        'invoice_date',
        'total_price_amount',
        'material',
        'client_id'
    ];


    /**
     * Get the invoice type associated.
     */
    public function invoiceType(): BelongsTo
    {
        return $this->belongsTo(InvoiceType::class);
    }

    /**
     * Get the client associated to the invoice.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
