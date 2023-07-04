<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotion';
    protected $primaryKey = 'promotion_id';
    protected $keyType = 'string';

    protected $fillable = [
        'promotion_id',
        'promotion_name',
        'promotion_discount',
        'promotion_code',
        'promotion_date_created',
        'promotion_updated',
    ];

    public $timestamps = false;
}
