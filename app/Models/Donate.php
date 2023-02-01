<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    use HasFactory;

    protected $fillable = [
        'FundID',
        'ReceiptName',
        'ReceiptTexID',
        'ReceiptAddress',
        'ReceiptSender',
        'ContactName',
        'ContactTel',
        'DateTrafer',
        'FileSlip',
        'ReceiptStatus',
        'user_id',
        'Amount',
        'ReceiptID',
        'CapitalScholarship',
        'CapitalScholarship_Amount',
        'CapitalScholarship_StudyCondition',
        'CapitalScholarship_PoorName',
        'CapitalScholarship_FundName',
        'CapitalScholarship_FundCondition',
        'CapitalScholarship_Other',
        'CapitalResearch',
        'CapitalResearch_Amount',
        'CapitalActivity',
        'CapitalActivity_Amount',

    ];

    public function getFund()
    {
        return $this->hasOne(RefFund::class, 'id', 'FundID');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'updated_at' => 'datetime:d/m/Y h:i',
    ];
}
