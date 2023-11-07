<?php

namespace App\Interface;

interface DataSource
{
    public function getData(): array;

    public function process(): array;
}
