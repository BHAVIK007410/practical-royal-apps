<?php

namespace App\Services;

/**
 * Class AppServices
 * 
 * @package App\Services
 */
class AppServices extends BaseService
{
    /**
     * Method getToken
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->getAuthToken();
    }

    /**
     * Method doLogin
     *
     * @param array $logindata
     *
     * @return array
     */
    public function doLogin(array $loginData): array
    {
        return $this->doAuthLogin($loginData);
    }
}
