<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Display profile page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProfile()
    {
        $user = Auth::user();

        return view('settings.profile', compact('user'));
    }

    /**
     * Save profile page after request validation
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function postProfile(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
          'avatar' => 'sometimes|max:2048|mimes:gif,png,jpeg,jpg',
          'firstname' => 'required|max:255',
          'lastname' => 'required|max:255',
          'email' => 'required|email|unique:users,email,'. Auth::id(),
          'password_old' => 'sometimes|old_password',
          'password' => 'sometimes|required_with:password_old|min:6|confirmed'
        ]);

        $this->users->saveAvatar($request, $user);

        $user->fill($request->except(['password']))->save();

        $user = $this->users->savePassword($request, $user);

        Auth::guard()->login($user);

        return redirect()->to('settings/profile')->with('status', "Profile saved.");
    }

    /**
     * Display email settings page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEmails()
    {
        $user = Auth::user();

        return view('settings.emails', compact('user'));
    }

    /**
     * Display billing page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getBilling()
    {
        $user = Auth::user();

        return view('settings.billing', compact('user'));
    }

    /**
     * Display account page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAccount()
    {
        $user = Auth::user();

        return view('settings.account', compact('user'));
    }

    /**
     * Save account page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postAccount(Request $request)
    {
        $this->validate($request, [
          'code' => 'required',
          'key' => 'required'
        ]);

        $user = Auth::user();

        if ($this->users->checkAvangateCredentials($request)) {
            $this->users->saveAvangateCredentials($request, $user);
        } else {
            return redirect()->back()->withErrors(['The credentials are not valid.']);
        }

        return redirect()->to('settings/account')->with('status', "Profile saved.");
    }
}
