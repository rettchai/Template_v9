<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPermissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'permission_th',
        'permission_en',
        'active',
    ];

    public function getPermissions()
    {
        return $this->belongsTo(Permissions::class, 'permission', 'id');
    }
}
