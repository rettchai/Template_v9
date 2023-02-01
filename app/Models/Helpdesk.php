<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helpdesk extends Model
{
    use HasFactory;
    protected $fillable = [
        'userID',
        'ItemID',
        'ItemName',
        'OtherName',
        'Place',
        'Details',
        'Notes',
        'Phone',
        'FullNameDoc',
        'FacDoc',
        'HelpDeskStatus',
        'StatusText',
        'created_by',
        'Position'

    ];
}
