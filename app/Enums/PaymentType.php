<?php

namespace App\Enums;

enum PaymentType : string
{
    case Internet = 'internet';
    case Cash = 'cash';
}
