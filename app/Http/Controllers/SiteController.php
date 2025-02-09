<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Requests\LoginRequest;
use App\Services\AppServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

/**
 * Class SiteController
 * 
 * @package App\Http\Controllers
 */
class SiteController extends Controller
{
    public AppServices $app;

    /**
     * Method __construct
     *
     * @param AppServices $app
     *
     * @return void
     */
    public function __construct(AppServices $app)
    {
        $this->app = $app;
    }

    /**
     * Method login
     *
     * @return View
     */
    public function login(): View
    {
        return view('login');
    }

    /**
     * Method doLogin
     *
     * @param LoginRequest $request
     *
     * @return RedirectResponse
     */
    public function doLogin(LoginRequest $request): RedirectResponse
    {
        try {
            $loginData = $request->validated();
            $login = $this->app->doLogin($loginData);

            if (!empty($login)) {
                $token = $login['token_key'];
                Session::put('logggedinuser_first_name', $login['user']['first_name']);
                Session::put('logggedinuser_last_name', $login['user']['last_name']);
                Session::put('logggedinuser_email', $login['user']['email']);
                Session::put('logggedinuser_password', $loginData['password']);
                return redirect()->route('dashboard')->with('success', 'User Login Successfully')->cookie('bearer_token', $token, 60, '/', null, true, true);
            }

            return redirect()->back()->with('error', 'Email or Password Wrong.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout()
    {
        Session::flush();
        Cookie::queue(Cookie::forget('bearer_token'));
        return redirect()->route('login')->with('success', 'User Logout Successfully');
    }
}
