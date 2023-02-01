<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefFacs extends Model
{
    use HasFactory;

    protected $fillable = [
        'UnivID',
        'FacNameTH',
        'FacNameEN',
    ];
}
