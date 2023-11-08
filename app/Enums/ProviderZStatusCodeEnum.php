<?php

namespace App\Enums;

enum ProviderZStatusCodeEnum: string
{
    case authorized = 'success';
    case decline = 'failed';
    case refunded = 'refunded';
}
