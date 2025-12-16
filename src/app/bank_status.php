<?php

namespace App;

enum bank_status :string
{
    case Awaiting = 'awaiting';
    case Payed = 'payed';
    case Failed = 'failed';
}
