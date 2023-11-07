<?php

namespace App\Maper;

use Carbon\Carbon;
use App\Interface\DataProcessor;
use App\Enums\ProviderYStatusCodeEnum;

class ProviderYMapper implements DataProcessor
{
    public function map($data): array
    {
        return [
            'provider_type' => 'DataProviderY',
            'amount' => $data['balance'],
            'currency' => $data['currency'],
            'email' => $data['email'],
            'status' => self::getStatusCode($data['status']),
            'registration_date' => Carbon::parse(str_replace('/', '-', $data['created_at']))->format('Y-m-d'),
            'id' => $data['id'],
        ];
    }

    public function getStatusCode($statusCode): string
    {
        $codes = ProviderYStatusCodeEnum::cases();
        foreach ($codes as $key => $value) {
            if ($value->value == $statusCode) {
                return $value->name;
            }
        }
    }


}