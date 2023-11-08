<?php

namespace App\Maper;

use Carbon\Carbon;
use App\Interface\DataProcessor;
use App\Enums\ProviderYStatusCodeEnum;
use App\Enums\ProviderZStatusCodeEnum;

class ProviderZMapper implements DataProcessor
{
    public function map($data): array
    {
        return [
            'provider_type' => 'DataProviderZ',
            'amount' => $data['value'],
            'currency' => $data['cur'],
            'email' => $data['e_mail'],
            'status' => self::getStatusCode($data['status_Code']),
            'registration_date' => Carbon::parse(str_replace('/', '-', $data['date']))->format('Y-m-d'),
            'id' => $data['identification'],
        ];
    }

    public function getStatusCode($statusCode): string
    {
        $codes = ProviderZStatusCodeEnum::cases();
        foreach ($codes as $key => $value) {
            if ($value->value == $statusCode) {
                return $value->name;
            }
        }
    }


}