<?php


function make_slug($text): array|string|null
{
    return preg_replace('/\s+/u', '-', trim($text));
}

// function generateRandomInteger($length)
//{
//    $characters = '0123456789';
//    $charactersLength = strlen($characters);
//    $randomInteger = '';
//    for ($i = 0; $i < $length; $i++) {
//        $randomInteger .= $characters[rand(0, $charactersLength - 1)];
//    }
//    $codeExist = Order::query()->where('order_code', $randomInteger)->first();
//    if ($codeExist) {
//        return self::generateRandomInteger(6);
//    }
//
//    return $randomInteger;
//}
//
// function generateRandomString($length): string
//{
//    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//    $charactersLength = strlen($characters);
//    $randomString = '';
//    for ($i = 0; $i < $length; $i++) {
//        $randomString .= $characters[rand(0, $charactersLength - 1)];
//    }
//    $codeExist = Coupon::query()->where('coupon_code', $randomString)->first();
//    if ($codeExist) {
//        return self::generateRandomString(6);
//    }
//
//    return $randomString;
//}
