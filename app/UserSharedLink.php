<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSharedLink extends Model
{
    protected $table = 'user_shared_links';
    protected $guarded = ['id'];
}
