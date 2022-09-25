<?php

namespace App\Enums;


enum UserType: string
{
    case Customer = 'customer';
    case Seller = 'seller';
    case Admin = 'admin';
}
