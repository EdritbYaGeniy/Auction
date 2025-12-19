<?php

namespace App\Enums;

enum Lots: string
{
    case STARTED = ('started');
    case AWAITING = ('awaiting');
    case FINISHED = ('finished');
}
