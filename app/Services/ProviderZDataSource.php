<?php

namespace App\Services;

use App\Interface\DataSource;
use App\Maper\ProviderZMapper;

class ProviderZDataSource implements DataSource
{
    public function getData(): array
    {
        return json_decode(file_get_contents(base_path('DataProviderZ.json')), true);
    }

    public function process(): array
    {
        $providerXMapper = new ProviderZMapper();

        return $providerXMapper->map($this->getData());
    }
}
