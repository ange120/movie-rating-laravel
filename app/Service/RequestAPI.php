<?php

namespace App\Service;
use GuzzleHttp\Client;
class RequestAPI
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param $region
     * @return array|array[]|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getTopRatedMovies($region)
    {
        $url = 'https://api.themoviedb.org/3/movie/top_rated';
        $headers = [
            'Authorization' => 'Bearer '.env('API_KEY')
        ];

        $currentPage = 1;
        $results = [];

        do {
            try {
                $response = $this->client->get($url, [
                    'headers' => $headers,
                    'query' => [
                        'language' => 'en-US',
                        'page' => $currentPage,
                        'region' => $region,
                    ],
                ]);

                $data = json_decode($response->getBody()->getContents(), true);

                $filteredResults = array_map(function ($item) {
                    return [
                        'id' => $item['id'],
                        'original_language' => $item['original_language'],
                        'original_title' => $item['original_title'],
                        'overview' => $item['overview'],
                        'popularity' => $item['popularity'],
                        'release_date' => $item['release_date'],
                        'vote_average' => $item['vote_average'],
                        'vote_count' => $item['vote_count'],
                    ];
                }, $data['results']);

                $results = array_merge($results, $filteredResults);

                $currentPage++;

            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } while ($currentPage <= $data['total_pages']);

        return $results;
    }

}
