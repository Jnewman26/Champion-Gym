<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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

    public function getAuthIdentifierName()
    {
        return 'member_id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->USER_PASSWORD;
    }

    public function getRememberToken()
    {
    }

    public function setRememberToken($value)
    {
    }

    public function getRememberTokenName()
    {
    }
}