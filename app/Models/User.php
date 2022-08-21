<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use App\Models\UserHasRole;
use App\Models\subscribers;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'name', 'email', 'phone', 'company', 'website', 'about', 'twoStepVerification', 'twoStepVerificationStatus', 'emailNotification', 'securityAlert', 'alwaysSignIn' ,'status', 'role', 'membership', 'image', 'apiKey', 'apiKeyStatus', 'password' ];

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

    public function userHasRole()
    {
        return $this->hasOne(UserHasRole::class, 'user_id');
    }

    public function subscribers()
    {
        return $this->hasOne(subscribers::class, 'user_id');
    }
}
