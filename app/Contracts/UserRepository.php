<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface UserRepository
{
    public function saveAvatar(Request $request, $user);

    public function savePassword(Request $request, $user);

    public function checkAvangateCredentials(Request $request);

    public function saveAvangateCredentials(Request $request, $user);
}