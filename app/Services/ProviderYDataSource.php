<?php

namespace App\Services;

use App\Interface\DataSource;
use App\Maper\ProviderYMapper;

class ProviderYDataSource implements DataSource
{
    public function getData(): array
    {
        return json_decode(file_get_contents(base_path('DataProviderY.json')), true);
    }

    public function process(): array
    {
        $providerXMapper = new ProviderYMapper();
        return $providerXMapper->map($this->getData());
    }
}