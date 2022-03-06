<?php

namespace Codersandip\MyFirstPackage\Tests\Models;

use Codersandip\MyFirstPackage\Contracts\UserCreatedMailableNotificationContracts;
use Codersandip\MyFirstPackage\Traits\UserCreatedMailableNotificationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements UserCreatedMailableNotificationContracts
{
    use  HasFactory;
    use Notifiable;
    use UserCreatedMailableNotificationTrait;

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
    ];
}
