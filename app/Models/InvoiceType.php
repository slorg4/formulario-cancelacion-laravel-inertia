<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Query\Builder|InvoiceType select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|InvoiceType where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 */
class InvoiceType extends Model
{
    use HasFactory;
}
