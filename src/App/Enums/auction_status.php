<?php

namespace App\Enums;

enum auction_status: string
{
    case Awaiting = 'awaiting';
    case Started = 'started';
    case Ended = 'ended';
}
