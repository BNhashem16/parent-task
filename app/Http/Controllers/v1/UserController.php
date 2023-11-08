<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProviderXDataSource;
use App\Services\ProviderYDataSource;
use App\Services\ProviderZDataSource;
use App\Filters\UserDataFilterService;

class UserController extends Controller
{
    public function index(Request $request, UserDataFilterService $userDataFilterService)
    {
        $providerXDataSource = new ProviderXDataSource();
        $providerYDataSource = new ProviderYDataSource();
        $providerZDataSource = new ProviderZDataSource();
        $filteredData = $userDataFilterService->filter([
            $providerXDataSource->process(),
            $providerYDataSource->process(),
            $providerZDataSource->process(),
        ], $request);

        return response()->json($filteredData->all());
    }
}
