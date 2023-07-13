<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'member_id';
    protected $keyType = 'string';

    protected $fillable = [
        'member_id',
        'member_first_name',
        'member_last_name',
        'member_ktp',
        'member_email',
        'member_phone_number',
        'member_password',
        'member_join_date',
        'member_updated',
    ];

    public $timestamps = false;
}
