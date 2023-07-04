<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'sales_id';
    protected $keyType = 'string';

    protected $fillable = [
        'sales_id',
        'sales_total',
        'payment_type',
        'sales_status',
        'payment_date_created',
    ];
    public $timestamps = false;
}
