<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    protected $fillable = ['name','email', 'password', 'role'];

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPasswordName()
    {
        return 'password';
        // TODO: Implement getAuthPasswordName() method.
    }

    public function getAuthPassword()
    {
        return $this->password;
        // TODO: Implement getAuthPassword() method.
    }

    public function getRememberToken()
    {
        return $this->remember_token;

        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
        // TODO: Implement getRememberTokenName() method.
    }
}
