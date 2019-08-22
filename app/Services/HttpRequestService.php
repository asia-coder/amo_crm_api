<?php
/**
 * Created by PhpStorm.
 * User: dilshod
 * Date: 22.08.19
 * Time: 15:00
 */

namespace App\Services;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class HttpRequestService
{
    /**
     * @var Client
     */
    protected $http_client;

    public function __construct()
    {
        $cookies = new \GuzzleHttp\Cookie\FileCookieJar(APP_DIR . '/storage/cookies.txt', true);
        $this->http_client = new Client([
            'cookies' => $cookies
        ]);
    }

    public function getRequest(string $url, array $options = [])
    {
        try {
            return $this->http_client->request('GET', $url, $options);
        } catch (GuzzleException $e) {
            exit($e);
        }
    }

    public function postRequest(string $url, array $options)
    {
        try {
            return $this->http_client->request('POST', $url, $options);
        } catch (GuzzleException $e) {
            exit($e);
        }
    }
}
