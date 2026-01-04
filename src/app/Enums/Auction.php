<?php

namespace App\Enums;

enum Auction: string
{
    case NO_STATUS = ('no_status');
    case FINISHED = ('finished');
    case STARTED = ('started');
}
