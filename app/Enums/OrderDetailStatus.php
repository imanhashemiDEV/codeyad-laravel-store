<?php

namespace App\Enums;

enum OrderDetailStatus : string
{
    case Send = 'send';
    case Received = 'received';
    case Rejected = 'rejected';
    case InProgress = 'in_progress';
}
