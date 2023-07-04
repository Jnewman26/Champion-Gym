<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'membership';
    protected $primaryKey = 'membership_id';
    protected $keyType = 'string';

    protected $fillable = [
        'membership_id',
        'membership_name',
        'membership_duration',
        'membership_duration',
        'membership_price',
        'membership_date_created',
        'membership_updated'
    ];

    public $timestamps = false;
}
