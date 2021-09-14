<?php

namespace Eyesee\Entities\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * @package Entities\User\Models
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ID = 'id';
    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const EMAIL_VERIFIED_AT = 'email_verified_at';
    const REMEMBER_TOKEN = 'remember_token';
    const NICKNAME = 'nickname';

    const TABLE = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
        self::NICKNAME,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        self::PASSWORD,
        self::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        self::EMAIL_VERIFIED_AT => 'datetime',
    ];
}
