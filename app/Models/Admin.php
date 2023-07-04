<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $keyType = 'string';

    protected $fillable = [
        'admin_id',
        'admin_name',
        'admin_role',
        'admin_password',
        'admin_date_created',
        'admin_updated'
    ];

    public $timestamps = false;
}
