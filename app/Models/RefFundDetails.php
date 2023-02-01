<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefFundDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'LineDetail',
        'FundID',
        'FillIn',
        'Descriptions',
        'LoopIn',
        ];

    public function getFund()
    {
        return $this->hasOne(RefFund::class, 'id', 'FundID');
    }
}
