<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Authenticatable
{
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $keyType = 'string';
    protected $guard = 'admin';
    protected $username = 'admin_name';

    protected $fillable = [
        'admin_id',
        'admin_name',
        'admin_role',
        'admin_password',
        'admin_date_created',
        'admin_updated'
    ];

    public $timestamps = false;

    public function getAuthIdentifierName()
    {
        return 'admin_id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->admin_password;
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
