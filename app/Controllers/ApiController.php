<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use CodeIgniter\Cache\CacheInterface;

class ApiController extends ResourceController
{
    protected $cache;

    public function __construct()
    {
        $this->cache = \Config\Services::cache();
    }

    public function getContributors()
    {
        $cacheKey = 'github_contributors';
        $cachedData = $this->cache->get($cacheKey);

        if ($cachedData) {
            return $this->respond(json_decode($cachedData, true));
        }

        $client = Services::curlrequest();
        $apiUrl = 'https://api.github.com/repos/LegacyAngel2K9/CoreX/contributors';
        $apiKey = getenv('GITHUB_API_KEY'); // Fetch from .env
        
        if (!$apiKey) {
            return $this->failServerError('GitHub API Key is missing. Check your .env file.');
        }
        
        $headers = [
            'User-Agent' => 'CoreX-Homepage',
            'Authorization' => 'token ' . trim($apiKey)
        ];

        try {
            $response = $client->get($apiUrl, ['headers' => $headers]);
            
            if ($response->getStatusCode() === 401) {
                return $this->failUnauthorized('GitHub API authentication failed. Check your token permissions.');
            }
            
            $contributors = $response->getBody();
            
            // Store data in cache for 1 hour (3600 seconds)
            $this->cache->save($cacheKey, $contributors, 3600);
            
            return $this->respond(json_decode($contributors, true));
        } catch (Exception $e) {
            return $this->failServerError('Failed to fetch contributors: ' . $e->getMessage());
        }
    }
}
