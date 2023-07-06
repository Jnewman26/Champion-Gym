<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    protected $table = 'spending';
    protected $primaryKey = 'spending_id';
    protected $keyType = 'string';

    protected $fillable = [
        'spending_id',
        'spending_name',
        'spending_total',
        'spending_description',
        'spending_date_created',
        'spending_updated',
    ];
    public $timestamps = false;
}
