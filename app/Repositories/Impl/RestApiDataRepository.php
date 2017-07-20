<?php


namespace UserTodo\Repositories\Impl;


use GuzzleHttp\Client;
use UserTodo\Repositories\Contracts\DataRepository;
use UserTodo\User;

class RestApiDataRepository implements DataRepository
{
    protected $apiClient;

    public function __construct()
    {
        $scheme          = config('usertodo.data_api.scheme');
        $host            = config('usertodo.data_api.host');
        $this->apiClient = new Client([
            'base_uri' => http_build_url([
                'scheme' => $scheme,
                'host'   => $host,
            ]),
        ]);
    }

    public function getUserData(int $id)
    {
        $resp = $this->apiClient->get("users/{$id}");

        return json_decode($resp->getBody(), true);
    }

    public function getTodosForUser(User $user): array
    {
        $resp = $this->apiClient->get("users/{$user->id}/todos");

        return json_decode($resp->getBody(), true);
    }
}