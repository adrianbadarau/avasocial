<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Crypt;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = Crypt::encrypt($value);
    }

    public function getCodeAttribute($value)
    {
        try {
            if ($value) {
                $value = Crypt::decrypt($value);
            }
            return $value;
        } catch (DecryptException $e) {
            //TODO: maybe send email to administrator to inform of the problem
        }
    }

    public function setKeyAttribute($value)
    {
        $this->attributes['key'] = Crypt::encrypt($value);
    }

    public function getKeyAttribute($value)
    {
        try {
            if ($value) {
                $value = Crypt::decrypt($value);
            }
            return $value;
        } catch (DecryptException $e) {
            //TODO: maybe send email to administrator to inform of the problem
        }
    }
}
