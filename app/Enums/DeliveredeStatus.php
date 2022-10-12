<?php

namespace App\Enums;


enum DeliveredStatus: string
{
    case Sending = 'sending';
    case Delivered = 'delivered';
}
