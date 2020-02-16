<?php

namespace Fanhai\Services\Sms;

use Illuminate\Support\Facades\Log;

use Fanhai\Services\Sms\Interfaces\SmsServiceInterface;

class SmsService implements SmsServiceInterface
{
    public function sendSms($number, $message){
        $apicode = env('ITEXTMO_API_CODE', false);

        Log::channel('debug')->info("$number, $message, $apicode");

        $ch = curl_init();
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
        curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
        http_build_query($itexmo));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec ($ch);
        curl_close ($ch);
    }
}    