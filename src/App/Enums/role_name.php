<?php

namespace App\Enums;

enum role_name: string
{
    case Admin = 'admin';
    case User = 'user';
    case Unauthorized = 'unauthorized';
}
