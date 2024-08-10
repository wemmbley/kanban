<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\Common\Http\Controllers\BaseController;

class AuthBaseController extends BaseController
{
    public function index()
    {
        return view('auth::auth');
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('login'));
    }
}
