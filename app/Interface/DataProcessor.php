<?php

namespace App\Interface;

interface DataProcessor
{
    public function map($data): array;

    public function getStatusCode($data): string;
}