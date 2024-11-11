<?php

namespace App\Enums;

enum ProductStatus : string
{
    case Active = 'Active';
    case Inactive = 'Inactive';
    case Banned = 'banned';
}
