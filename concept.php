<?php

interface Way{
    public function getSecretKey();
}

class fromFile implements Way{
    public function getSecretKey() {
        return 'abc';
    }
}

class fromDB implements Way{
    public function getSecretKey() {
        return 'abcdef';
    }
}

class fromSVM implements Way{
    public function getSecretKey() {
        return 'ghk';
    }
}

class fromCloud implements Way{
    public function getSecretKey() {
        return 'lmn';
    }
}

class Concept {
    private $client;

    public function __construct() {
        $this->client = new \GuzzleHttp\Client();
    }

    public function getUserData(Way $way) {
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $way->getSecretKey()
        ];

        $request = new \Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }

    function setWay($way){
        $this_way = $way;
    }
}

$a = new Concept(;
$a->getUserData($a->setWay(fromDB::class));