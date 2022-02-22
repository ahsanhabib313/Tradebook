<?php

namespace App\Services;

class EncryptionService
{

    static function encrypt_decrypt($action, $string, $secret_key = null, $secret_iv = null)
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = (!$secret_key) ? $secret_key : '@2020ITCdevSC';
        $secret_iv = (!$secret_iv) ? $secret_iv : '@5050WxAR';

        // hash
        $key = hash('sha1', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha1', $secret_iv), 0, 16);

        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }
}
