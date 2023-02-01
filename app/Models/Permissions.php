<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'username',
        'permission',
        'active',
    ];


    public function getRefPermissions()
    {
        return $this->hasOne(RefPermissions::class, 'id','permission');
    }

    public function getPermissionsRules()
    {
        return $this->hasMany(PermissionsRule::class, 'permissions_id','id');
    }
}
