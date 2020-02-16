<?php

namespace Fanhai\Services\Sms\Interfaces;

interface SmsServiceInterface
{
    public function sendSms($number, $message);
}