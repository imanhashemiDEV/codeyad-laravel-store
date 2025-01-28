<?php

namespace App\Enums;

enum OrderStatus : string
{
    case Successful = 'successful';
    case Canceled = 'canceled';
    case Draft = 'draft';
}
