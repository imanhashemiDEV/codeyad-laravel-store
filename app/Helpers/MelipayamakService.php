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
            $from = '50004001014556';
            $text = $sms_text;
            $response = $sms->send($to,$from,$text);
            $json = json_decode($response);
           // echo $json->Value; //RecId or Error Number
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}
