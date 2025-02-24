<?php

namespace App\Helpers;
use Melipayamak;
class MelipayamakService
{
    public static function sendSMS($mobile,$sms_text)
    {
        try{
            $sms = Melipayamak::sms();
            $to = $mobile;
            $from = '';
            $text = $sms_text;
            $response = $sms->send($to,$from,$text);
            return json_decode($response);
           // echo $json->Value; //RecId or Error Number
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
