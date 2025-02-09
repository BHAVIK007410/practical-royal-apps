<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use Illuminate\Contracts\View\View;

/**
 * Class UserController
 * 
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    public UserServices $user;

    /**
     * Method __construct
     *
     * @param AppServices $app
     *
     * @return void
     */
    public function __construct(UserServices $user)
    {
        $this->user = $user;
    }

    /**
     * Method dashboard
     *
     * @return View
     */
    public function dashboard(): View
    {
        return view('dashboard');
    }
}
