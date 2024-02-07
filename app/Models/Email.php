<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @method static \Illuminate\Database\Query\Builder|Email select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Email create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Email firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Email firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Email where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 */
class Email extends Model
{
    use HasFactory;
}
