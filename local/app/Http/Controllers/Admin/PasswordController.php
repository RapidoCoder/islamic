<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $guard = 'admin';
    protected $broker = 'admins';
    protected $redirectTo = '/admin';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function getEmail()
    {
        return $this->showLinkRequestForm();
    }

    public function showLinkRequestForm()
    {
        if (property_exists($this, 'linkRequestView')) {
            return view($this->linkRequestView);
        }

        if (view()->exists('admin.email')) {
            return view('admin.email');
        }

        return view('admin.password');
    }

    public function showResetForm(Request $request, $token = null)
    {

        if (is_null($token)) {
            return $this->getEmail();
        }
        $email = $request->input('email');

        if (property_exists($this, 'resetView')) {
            return view($this->resetView)->with(compact('token', 'email'));
        }

        if (view()->exists('admin.reset')) {
            return view('admin.reset')->with(compact('token', 'email'));
        }

        return view('admin.reset')->with(compact('token', 'email'));
    }

}
