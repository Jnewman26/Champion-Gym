<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    protected $table = 'sales_detail';
    protected $primaryKey = 'sales_id';
    protected $keyType = 'string';

    protected $fillable = [
        'sales_id',
        'member_id',
        'membership_name',
        'promotion_discount',
        'personal_trainer_price',
        'membership_join_date',
        'membership_end_date',
    ];

    public $timestamps = false;
}
