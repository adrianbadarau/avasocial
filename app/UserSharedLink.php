<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSharedLink extends Model
{
    protected $table = 'user_shared_links';
    protected $guarded = ['id'];

    public function createOrReturn()
    {
        if($this->where('user_email','=',$this->email)->count()){
            return $this->where('user_email','=',$this->short_link)->first();
        }else{
            return $this;
        }
    }
}
