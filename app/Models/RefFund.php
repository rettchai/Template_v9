<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefFund extends Model
{
    use HasFactory;

    protected $fillable = [
        'FundName',
        'Description',
        'active',
    ];

    public function getFundDetails()
    {
        return $this->hasMany(RefFundDetails::class, 'FundID', 'id');
    }

}
