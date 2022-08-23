<?php

namespace App\Services;

abstract class ConnectionMoblixService {

    protected $headers;
    protected $token;

    abstract protected function autenticar();

    abstract public function setHeaders(array $value);
    abstract public function setToken(string $value);
    abstract public function getToken();
}