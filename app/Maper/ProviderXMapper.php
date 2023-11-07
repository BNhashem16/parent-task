<?php

namespace App\Maper;

use App\Enums\ProviderXStatusCodeEnum;
use App\Interface\DataProcessor;
use Carbon\Carbon;

class ProviderXMapper implements DataProcessor
{
    public function map($data): array
    {
        return [
            'provider_type' => 'DataProviderX',
            'amount' => $data['parentAmount'],
            'currency' => $data['Currency'],
            'email' => $data['parentEmail'],
            'status' => self::getStatusCode($data['statusCode']),
            'registration_date' => Carbon::parse($data['registerationDate'])->format('Y-m-d'),
            'id' => $data['parentIdentification'],
        ];
    }

    public function getStatusCode($statusCode): string
    {
        $codes = ProviderXStatusCodeEnum::cases();
        foreach ($codes as $key => $value) {
            if ($value->value == $statusCode) {
                return $value->name;
            }
        }
    }
}
