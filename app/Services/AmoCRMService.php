<?php
/**
 * Created by PhpStorm.
 * User: dilshod
 * Date: 22.08.19
 * Time: 13:40
 */

namespace App\Services;


class AmoCRMService
{
    /**
     * @var string
     */
    private const API_KEY = "d39ec1687c552be5a6baaa26dc0e51b44ce031b6";

    /**
     * @var string
     */
    private const BASE_URL = "https://uktamovich95.amocrm.ru/";

    /**
     * @var string
     */
    private const USER_LOGIN = "uktamovich95@gmail.com";

    /**
     * @var string
     */
    private const DATA_TYPE = "json";

    /**
     * @var array
     */
    protected $user;

    /**
     * @var array
     */
    protected $accounts;

    public function __construct()
    {
        $auth = $this->auth();

        if (!$auth['auth']) {
            throw new \Exception('Ошибка при авторизации!');
        }

        $this->user = $auth['user'];
        $this->accounts = $auth['accounts'];
    }

    public function auth()
    {
        $url = "private/api/auth.php";
        $request_url = self::getUrl($url);

        $client = new HttpRequestService();
        $response = $client->postRequest($request_url, ['json' => self::getUserData()]);
        $result = json_decode($response->getBody(), true);

        return $result['response'];
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getAllAccounts()
    {
        return $this->accounts;
    }

    protected static function getUrl(string $url, array $params = []): string
    {
        $url_params = "?";
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $url_params .= $key . "=" . $value . "&";
            }
        }

        return self::BASE_URL . $url . $url_params . 'type=' . self::DATA_TYPE;
    }

    public function getLastLeads()
    {
        $url = "api/v2/leads";
        $request_url = self::getUrl($url, [
            'filter/active' => 1
        ]);

        $client = new HttpRequestService();
        $response = $client->getRequest($request_url);
        $result = json_decode($response->getBody(), true);

        return $result;
    }

    public static function getUserData(): array
    {
        return [
            'USER_LOGIN' => self::USER_LOGIN,
            'USER_HASH'  => self::API_KEY
        ];
    }
}
