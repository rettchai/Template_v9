<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PermissionsRule extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'permissions_id',
        'pages',
        'remark',
        'active',
        'conference_id',
        'user_id',
    ];

    public function getPermission()
    {
        return $this->belongsTo(Permissions::class, 'permissions_id', 'id')->orderBy('id');
    }

}
