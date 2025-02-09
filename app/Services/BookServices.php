<?php

namespace App\Services;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Class BookServices
 * 
 * @package App\Services
 */
class BookServices extends BaseService
{
    /**
     * Method storeBook
     *
     * @param array $bookData
     *
     * @return bool
     */
    public function storeBook(array $bookData): bool
    {
        try {
            $this->apiUrl .= '/api/v2/books';
            $bookCreateData = [
                'title' => $bookData['title'],
                'release_date' => Carbon::parse($bookData['releasedate'])->setTime(00, 00, 00, 000)->toIso8601String(),
                'isbn' => $bookData['isbn'],
                'format' => $bookData['format'],
                'description' => $bookData['description'],
                'number_of_pages' => (int) $bookData['pages'],
                'author' => ["id" => $bookData['author']]
            ];
            $response = $this->post($bookCreateData);

            // Check if the request was successful and token exists
            if ($response->successful()) {
                return true;
            }
        } catch (Exception $e) {
            Log::debug('Login Error: ' . $e->getMessage());
        }

        return false;
    }
}
