<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Query\Builder|Client select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Client create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Client firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Client firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Client where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 */
class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
