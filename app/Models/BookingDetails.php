<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'BookingID',
'Comments',
'DetailStatus',
'DetailStatusText',
'created_by',

    ];
}
