<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpdeskDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'HelpDeskID',
        'Comments',
        'DetailStatus',
        'DetailStatusText',
        'created_by',
        'created_type',
    ];

    public function getHelpdesk()
    {
        return $this->hasOne(Helpdesk::class, 'id', 'HelpDeskID');
    }
}
