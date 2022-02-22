<?php

namespace App\Core;

/**
 *
 * Class BaseMiddleware
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Core\Middlewares;
 */


abstract class BaseMiddleware
{
    abstract public function execute();
}