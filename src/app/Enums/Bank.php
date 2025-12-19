<?php

namespace App\Enums;

enum Bank: string
{
    case WAITING_STATUS = ('waiting_status');
    case PAID = ('paid');
    case NOT_PAID = ('not_paid');
}
