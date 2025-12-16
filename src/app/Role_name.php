<?php

namespace app;

enum Role_name: string
{
    case Admin = 'admin';
    case User = 'user';
    case Unauthorized = 'unauthorized';
}
