<?php
namespace App\Filters;

class UserDataFilterService
{
    public function filter(array $data, $request)
    {
        $data = collect($data);
        $filteredData = $data->filter(function ($user) use ($request) {
            return $this->filterProvider($user, $request->provider);
        })->filter(function ($user) use ($request) {
            return $this->filterBalanceMin($user, $request->balanceMin);
        })->filter(function ($user) use ($request) {
            return $this->filterBalanceMax($user, $request->balanceMax);
        })->filter(function ($user) use ($request) {
            return $this->filterCurrency($user, $request->currency);
        })->filter(function ($user) use ($request) {
            return $this->filterStatusCode($user, $request->statusCode);
        });

        return $filteredData;
    }

    private function filterProvider($user, $provider)
    {
        return is_null($provider) || $user['provider_type'] == $provider;
    }

    private function filterBalanceMin($user, $balanceMin)
    {
        return is_null($balanceMin) || $user['amount'] >= $balanceMin;
    }

    private function filterBalanceMax($user, $balanceMax)
    {
        return is_null($balanceMax) || $user['amount'] <= $balanceMax;
    }

    private function filterCurrency($user, $currency)
    {
        return is_null($currency) || $user['currency'] == $currency;
    }

    private function filterStatusCode($user, $statusCode)
    {
        return is_null($statusCode) || $user['status'] == $statusCode;
    }

}