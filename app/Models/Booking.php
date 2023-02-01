<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'ItemID',
        'StartDateTime',
        'EndDateTime',
        'userID',
        'BookingStatus',
        'Comments',
        'created_by',
    ];
}
