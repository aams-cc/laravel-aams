# Laravel AAMS Connector

The **Laravel AAMS Connector** is a Laravel package that provides an easy integration with the AAMS API, allowing you to interact with casinos and related data seamlessly.

## Features

- Fetch casinos by `Advertisement`

## Installation

Require the package via Composer:

```bash
composer require aams-cc/laravel-aams
```

## Configuration

```bash
php artisan vendor:publish --provider="Aams\\LaravelAams\\Providers\\AamsServiceProvider"
```

```bash
AAMS_API_TOKEN=your_api_token_here
AAMS_API_ENDPOINT=https://api.example.com
```

## Authors

- [AAMS](mailto:general@aams.cc) - [Website](https://aams.cc)

## Sponsorship

Support the development of this package by sponsoring us! 💖

[![Sponsor Logo](https://search.casino/sponsorship-logo.png)](https://search.casino) 