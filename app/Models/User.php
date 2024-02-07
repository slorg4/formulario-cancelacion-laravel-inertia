<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static \Illuminate\Database\Query\Builder|User select(array|mixed $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|User create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User firstOrNew(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User firstOrCreate(array $attributes = [], array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User where(\Closure|string|array|\Illuminate\Contracts\Database\Query\Expression $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
