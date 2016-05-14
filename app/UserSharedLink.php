<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSharedLink extends Model
{
    protected $table = 'user_shared_links';
    protected $guarded = ['id'];

    public function createOrReturn()
    {
        $gigi = $this
            ->where('user_email','=',$this->user_email)
            ->where('product_ids','=',$this->product_ids)
            ->count();
        if($this
            ->where('user_email','=',$this->user_email)
            ->where('product_ids','=',$this->product_ids)
            ->count()){
            return $this->where('user_email','=',$this->user_email)->where('product_ids','=',$this->product_ids)->first();
        }else{
            return $this;
        }
    }
}
