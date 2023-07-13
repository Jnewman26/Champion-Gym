<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $table = 'presence';
    protected $primaryKey = 'presence_id';
    protected $keyType = 'string';

    protected $fillable = [
        'presence_id',
        'member_id',
        'presence_date_created',
    ];

    public $timestamps = false;
}
