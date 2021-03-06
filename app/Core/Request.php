<?php

namespace App\Core;

/**
 * 
 * Class Request
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Core
 */

class Request
{
    public  function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position == false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public  function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(): bool
    {
        return $this->method() === 'get';
    }

    public function isPost(): bool
    {
        return $this->method() === 'post';
    }

    public  function getBody(): array
    {
        $body = [];
        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }

        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }

        return $body;
    }

    public function getParam($key, $default = false)
    {
        $data = $this->getBody();
        if (isset($data[$key])) {
            return $data[$key];
        }

        return $default;
    }
}
