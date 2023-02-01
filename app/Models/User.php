<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;


use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;


class User extends Authenticatable implements LdapAuthenticatable
// class User extends Authenticatable
{
    // use HasFactory, Notifiable;
    use HasFactory;
    use Notifiable;
    use AuthenticatesWithLdap;


    protected $fillable = [

        'name',
        'username',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'location',
        'about',
        'remember_token',
        'auth_type',
        'auth_id',
        'token',
        'refresh_token',
        'profile_photo_path',
        'active',
        'FacID',
        'Position',
        'FullNameDoc',
        'distinguishedname',
        'fullnameAD',
        'guid',
        'domain',

    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getDonate()
    {
        return $this->hasMany(Donate::class, 'user_id', 'id');
    }

    public function getFac()
    {
        return $this->hasOne(RefFacs::class, 'id', 'FacID');
    }

}
