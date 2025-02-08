<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;

class Home extends Controller
{
    public function index()
    {
        $data['team'] = $this->fetchContributors();
        return view('home', $data);
    }

    private function fetchContributors()
    {
        $client = Services::curlrequest();
        $apiUrl = 'https://api.github.com/repos/LegacyAngel2K9/CoreX/contributors';
        $apiKey = getenv('GITHUB_API_KEY'); // Fetch from .env

        if (!$apiKey) {
            return ['error' => 'GitHub API Key is missing. Check your .env file.'];
        }

        $headers = [
            'User-Agent' => 'CoreX-Homepage',
            'Authorization' => 'token ' . trim($apiKey)
        ];

        try {
            $response = $client->get($apiUrl, ['headers' => $headers]);
            if ($response->getStatusCode() === 401) {
                return ['error' => 'GitHub API authentication failed. Check your token permissions.'];
            }
            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            return ['error' => 'Failed to fetch contributors: ' . $e->getMessage()];
        }
    }
}