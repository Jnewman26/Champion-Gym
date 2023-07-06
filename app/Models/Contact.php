<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'contact_id';
    protected $keyType = 'string';

    protected $fillable = [
        'contact_id',
        'whatsapp',
        'instagram',
        'facebook',
        'contact_date_created',
        'contact_updated',
    ];

    public $timestamps = false;
}
