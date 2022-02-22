<?php


namespace App\Core\Exception;

/**
 *
 * Class NotFoundException
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Core\Exception;
 */

class NotFoundException extends \Exception
{
    protected $message = 'Route not found';
    protected $code = 404;

    public function __construct($message = null,  $code = null){
    	if ($message) {
    		$this->message = $message;
    	}

    	if ($code) {
    		$this->code = $code;
    	}
    }
}