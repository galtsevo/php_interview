<?php

interface IXMLHttpService{}

class XMLHTTPRequestService implements IXMLHttpService{}

class Http {
    private $service;

    public function __construct(IXMLHttpService $xmlHttpService) { }

    public function get(string $url, array $options) {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url) {
        $this->service->request($url, 'GET');
    }
}



