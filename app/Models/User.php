<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'status',
        'contact',
        'student_id',
        'address',
        'email',
        'external_provider',
        'external_id',
        'is_banned',
        'password',
        'approved_at',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function scopeNameFilter($q)
    {
        if (!empty(request()->search)) {
            $q->Where('name', 'LIKE', '%' .  request()->search  .  '%')
                ->OrWhere('email', 'LIKE', '%' .  request()->search  .  '%');
        }

        return $q;
    }

    public function scopeRoleFilter($q)
    {
        if (request()->search_col != null) {
            $q->Where('is_admin', 'LIKE', '%' .  request()->search_col  .  '%');
        }
        return $q;
    }
}
