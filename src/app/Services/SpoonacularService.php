<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SpoonacularService
{
    private $apiKey;
    private $baseUrl = 'https://api.spoonacular.com/recipes';

    public function __construct()
    {
        $this->apiKey = config('services.spoonacular.api_key');
    }

    /**
     * API接続テスト用
     */
    public function testConnection()
    {
        try {
            $response = Http::get($this->baseUrl . '/random', [
                'apiKey' => $this->apiKey,
                'number' => 1
            ]);

            return $response->successful();
        } catch (\Exception $e) {
            Log::error('API Connection Test Failed', ['message' => $e->getMessage()]);
            return false;
        }
    }

    public function getRandomRecipe($cuisine = null, $number = 1)
    {
        // 後で実装
        return null;
    }
}
