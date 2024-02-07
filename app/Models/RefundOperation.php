<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static \Illuminate\Database\Query\Builder|RefundOperation select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|RefundOperation where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 */
class RefundOperation extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'old_invoice_id',
        'new_invoice_id',
        'reason',
        'authorized_by',
        'operation_type_id',
    ];


    /**
     * Get the partner associated to this operation.
     */
    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    /**
     * Get the old invoice associated to this operation.
     */
    public function oldInvoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'old_invoice_id');
    }

    /**
     * Get the new invoice associated to this operation.
     */
    public function newInvoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'new_invoice_id');
    }

    /**
     * Get the operation type associated.
     */
    public function operationType(): BelongsTo
    {
        return $this->belongsTo(OperationType::class);
    }
}
