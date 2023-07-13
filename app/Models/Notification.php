<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';
    protected $primaryKey = 'notification_id';
    protected $keyType = 'string';

    protected $fillable = [
        'notification_id',
        'member_id',
    ];

    public $timestamps = false;
}
