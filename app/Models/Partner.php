<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @method static \Illuminate\Database\Query\Builder|Partner select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Partner create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Partner firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Partner firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Partner where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 */
class Partner extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
