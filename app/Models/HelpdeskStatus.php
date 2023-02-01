<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'active',
        'HelpdeskStatusTH',
        'HelpdeskStatusEN',
    ];

}
