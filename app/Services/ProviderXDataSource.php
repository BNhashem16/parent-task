<?php

namespace App\Services;

use App\Interface\DataSource;
use App\Maper\ProviderXMapper;

class ProviderXDataSource implements DataSource
{
    public function getData(): array
    {
        return json_decode(file_get_contents(base_path('DataProviderX.json')), true);
    }

    public function process(): array
    {
        $providerXMapper = new ProviderXMapper();
        return $providerXMapper->map($this->getData());
    }
}
