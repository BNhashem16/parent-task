<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Http\Response;
use Tests\TestCase;

class ProviderTest extends TestCase
{
    
    public function test_show_all_providers_is_give_successful()
    {
        $response = $this->getJson('/api/v1/users');
        // * it should return 3 records
        $response->assertJsonCount(3);
        $response->assertStatus(Response::HTTP_OK);

    }

    public function test_show_all_providers_with_filter_by_status()
    {
        $response = $this->getJson('/api/v1/users?statusCode=authorized');
        // * it should return 2 records
        $response->assertJsonCount(2);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_show_all_providers_with_filter_by_currency_usd()
    {
        $response = $this->getJson('/api/v1/users?currency=USD');
        // * it should return 1 records
        $response->assertJsonCount(1);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_show_all_providers_with_filter_by_balance_min()
    {
        $response = $this->getJson('/api/v1/users?balanceMin=250');
        // * it should return 2 records
        $response->assertJsonCount(2);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_show_all_providers_with_filter_by_balance_max()
    {
        $response = $this->getJson('/api/v1/users?balanceMax=250');
        // * it should return 1 records
        $response->assertJsonCount(1);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_show_all_providers_with_filter_by_provider()
    {
        $response = $this->getJson('/api/v1/users?provider=DataProviderX');
        // * it should return 1 records
        $response->assertJsonCount(1);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_show_all_providers_with_filter_by_all()
    {
        $response = $this->getJson('/api/v1/users?provider=DataProviderX&statusCode=authorized&currency=USD&balanceMin=200&balanceMax=250');
        // * it should return 1 records
        $response->assertJsonCount(1);
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_show_all_providers_with_filter_by_all_and_not_found()
    {
        $response = $this->getJson('/api/v1/users?provider=DataProviderX&statusCode=decline&currency=USD&balanceMin=200&balanceMax=250');
        // * it should return 0 records
        $response->assertJsonCount(0);
        $response->assertStatus(Response::HTTP_OK);
    }

}
