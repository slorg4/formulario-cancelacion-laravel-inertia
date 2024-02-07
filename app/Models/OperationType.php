<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @method static \Illuminate\Database\Query\Builder|OperationType select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|OperationType where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 */
class OperationType extends Model
{
    use HasFactory;
}
