<?php

namespace App\Repositories;

use App\Contracts\UserRepository as Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Avangate\ApiSdk;

class UserRepository implements Contract
{
    /**
     * Save the avatar of user
     * @param Request $request
     * @param $user
     */
    public function saveAvatar(Request $request, $user)
    {
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $request->file('avatar')->move(public_path('avatar'), $user->id .'.'. $request->file('avatar')->guessExtension());
        }
    }

    /**
     * Save new password of user
     *
     * @param Request $request
     * @param $user
     *
     * @return mixed
     */
    public function savePassword(Request $request, $user)
    {
        $passwordOld = $request->get('password_old');
        if (!empty($passwordOld)) {
            $user->password = bcrypt($request->get('password'));
            $user->save();
        }

        return $user;
    }

    public function checkAvangateCredentials(Request $request)
    {
        $apiSdk = new ApiSdk();

        return $apiSdk->isGoodAuthData($request->get('key'), $request->get('code'));

    }

    public function saveAvangateCredentials(Request $request, $user)
    {
        $user->code = $request->get('code');
        $user->key = $request->get('key');

        $user->save();

        return $user;
    }
}