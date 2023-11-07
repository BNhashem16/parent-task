<?php

namespace App\Enums;

enum ProviderYStatusCodeEnum: int
{
    case authorized = 100;
    case decline = 200;
    case refunded = 300;
}
