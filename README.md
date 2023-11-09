<p align="center"><a href="https://www.parent.app/" target="_blank"><img src="https://www.parent.app/hubfs/Logo.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>

</p>

## About Task

We have two providers collect data from them in json files we need to read and make some filter operations on them to get the result

- DataProviderX data is stored in [DataProviderX.json]
- DataProviderY data is stored in [DataProviderY.json]

## Run Locally

Clone the project

```bash
  git clone https://github.com/BNhashem16/parent-task.git
```

Go to the project directory

```bash
  cd parent-task
```

Create .env file

```bash
  make your .env file 
```

Install Depandinces

```bash
  composer install
```

finally, run docker

```bash
  ./vendor/bin/sail up
```

## Calling Endpoint

- **[users endpoint](http://parent-task.test/api/v1/users)**


## API Reference

#### Get all users

```http
  GET http://parent-task.test/api/v1/users
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `provider` | `string` | **Nullable**. DataProviderX, DataProviderY, DataProviderZ |
| `balanceMin` | `int` | **Nullable**. |
| `balanceMax` | `int` | **Nullable**. |
| `currency` | `string` | **Nullable**. |
| `statusCode` | `string` | **Nullable**. authorized, decline, refunded |

## Filteration Examples

| provider     | balanceMin  | balanceMax   | currency | statusCode
| -------- | ---- | ---------- |---------- |---------- |
| DataProviderX    | 250   | 500   | AED | authorized
| DataProviderY      | 50   | 600 | EGP | decline
| DataProviderZ  | 100   | 200 | USD | refunded


## Running Tests

To run tests, run the following command

```bash
  php artisan test
```

## Authors

- [@bnhashem](https://github.com/BNhashem16/parent-task)

