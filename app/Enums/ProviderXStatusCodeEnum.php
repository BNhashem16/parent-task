<?php

namespace App\Enums;

enum ProviderXStatusCodeEnum: int
{
    case authorized = 1;
    case decline = 2;
    case refunded = 3;
}
