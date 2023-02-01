<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_typesTH',
        'item_typesEN',
        'active',
    ];
}
