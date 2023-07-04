<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalTrainer extends Model
{
    protected $table = 'personal_trainer';
    protected $primaryKey = 'personal_trainer_id';
    protected $keyType = 'string';

    protected $fillable = [
        'personal_trainer_id',
        'personal_trainer_session',
        'personal_trainer_duration',
        'personal_trainer_price',
        'personal_trainer_date_created',
        'personal_trainer_updated'
    ];

    public $timestamps = false;
}
