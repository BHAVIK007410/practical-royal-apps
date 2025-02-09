<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class AuthorServices
 * 
 * @package App\Services
 */
class AuthorServices extends BaseService
{
    /**
     * Method getAllAuthors
     *
     * @return array
     */
    public function getAllAuthors(): array
    {
        $returnData = [];

        try {
            $this->apiUrl .= '/api/v2/authors?orderBy=id&direction=ASC&limit=12&page=1';
            $response = $this->get();
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

    /**
     * Method getAuthor
     *
     * @param string $id
     *
     * @return array
     */
    public function getAuthor(string $id): array
    {
        $returnData = [];

        try {
            $this->apiUrl .= '/api/v2/authors/' . $id;
            $response = $this->get();
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

    /**
     * Method authorBooks
     *
     * @param string $id
     *
     * @return array
     */
    public function authorBooks(string $id): array
    {
        $returnData = [];

        try {
            $this->apiUrl .= '/api/v2/authors/' . $id;
            $response = $this->get();
            $data = $response->json();

            // Check if the request was successful and token exists
            if ($response->successful()) {
                $returnData = isset($data['books']) ? $data['books'] : [];
            }
        } catch (Exception $e) {
            Log::debug('Login Error: ' . $e->getMessage());
        }

        return $returnData;
    }

    /**
     * Method delAuthor
     *
     * @param string $id
     *
     * @return bool
     */
    public function delAuthor(string $id): bool
    {
        try {
            $this->apiUrl .= '/api/v2/authors/' . $id;
            $response = $this->delete();

            // Check if the request was successful and token exists
            if ($response->successful()) {
                return true;
            }
        } catch (Exception $e) {
            Log::debug('Login Error: ' . $e->getMessage());
        }

        return false;
    }

    /**
     * Method createuser
     *
     * @param array $userdata
     *
     * @return bool
     */
    public function createuser(array $userdata): bool
    {
        try {
            $this->apiUrl .= '/api/v2/authors';
            if (isset($userdata['token'])) {
                $this->headers['Authorization'] = 'Bearer ' . $userdata['token'];
            }

            $response = $this->post($userdata);
            if ($response->successful()) {
                return true;
            }
        } catch (Exception $e) {
            Log::debug('Login Error: ' . $e->getMessage());
        }

        return false;
    }
}
