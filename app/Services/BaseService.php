<?php

namespace App\Services;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

/**
 * Class BaseService
 * 
 * @package App\Services
 */
class BaseService
{
    public string $apiUrl;
    public array $headers = [];

    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->apiUrl = config('services.api_url');
        $this->headers = [
            'Accept-Language' => 'en-US,en;q=0.9',
            'Content-Type' => 'application/json',
            'Origin' => '',
            'Referer' => $this->apiUrl,
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36',
            'accept' => 'application/json',
        ];

        if (!$request->hasCookie('bearer_token')) {
            $token = $this->getAuthToken();
            if ($token != '') {
                $this->headers['Authorization'] = 'Bearer ' . $token;
            }
            $this->apiUrl = config('services.api_url');
        }

        $this->getBearerToken($request);
    }

    /**
     * Method getToken
     *
     * @return string
     */
    public function getAuthToken(): string
    {
        $loginData = [
            'email' => Session::has('logggedinuser_email') ? Session::get('logggedinuser_email') : config('services.royal.email'),
            'password' => Session::has('logggedinuser_password') ? Session::has('logggedinuser_password') :config('services.royal.password'),
        ];
        $data = $this->doAuthLogin($loginData);
        return isset($data['token_key']) ? $data['token_key'] : '';
    }

    /**
     * Method doLogin
     *
     * @param array $logindata
     *
     * @return array
     */
    public function doAuthLogin(array $loginData): array
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
            Log::debug('Auth Login Error: ' . $e->getMessage());
        }

        return $returnData;
    }

    /**
     * Method getBearerToken
     *
     * @param Request $request
     */
    public function getBearerToken(Request $request)
    {
        if ($request->hasCookie('bearer_token')) {
            $token = $request->cookie('bearer_token');
            if ($token != '') {
                $this->headers['Authorization'] = 'Bearer ' . $token;
            }
        }
    }

    /**
     * Method post
     *
     * @param array $postData
     */
    public function post(array $postData)
    {
        return Http::withoutVerifying()->withHeaders($this->headers)->post($this->apiUrl, $postData);
    }

    /**
     * Method get
     */
    public function get()
    {
        return Http::withoutVerifying()->withHeaders($this->headers)->get($this->apiUrl);
    }

    /**
     * Method delete
     */
    public function delete()
    {
        return Http::withoutVerifying()->withHeaders($this->headers)->delete($this->apiUrl);
    }
}
