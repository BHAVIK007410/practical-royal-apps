<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class UserServices
 * 
 * @package App\Services
 */
class UserServices extends BaseService
{
    /**
     * Method doLogin
     *
     * @param array $logindata
     *
     * @return array
     */
    public function doLogin(array $loginData): array
    {
        $returnData = [];

        try {
            $this->apiUrl .= '/api/v2/token';
            $response = $this->post($loginData);
            $data = $response->json();

            // Check if the request was successful and token exists
            if ($response->successful()) {
                $returnData = $data;
            }
        } catch (Exception $e) {
            Log::debug('Login Error: ' . $e->getMessage());
        }

        return $returnData;
    }
}
