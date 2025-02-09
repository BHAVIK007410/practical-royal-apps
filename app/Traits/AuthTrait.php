<?php

namespace App\Traits;

use App\Services\AppServices;
use Illuminate\Http\Request;

/**
 * trait AuthTrait
 * 
 * @package App\Traits
 */
trait AuthTrait
{
    /**
     * Method getToken
     *
     * @param Request $request
     */
    public function attachToken(Request $request)
    {
        exit('Remove trait');
    }
}
