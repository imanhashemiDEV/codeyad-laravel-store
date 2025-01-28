<?php

namespace App\Enums;

enum OrderDetailStatus : string
{
    case Received = 'received';
    case Rejected = 'rejected';
    case InProgress = 'in_progress';
}
