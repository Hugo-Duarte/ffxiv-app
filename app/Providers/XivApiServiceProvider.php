<?php

namespace App\Providers;

use App\Services\XivApi\Connector\XivApiConnector;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\ServiceProvider;

class XivApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(XivApiConnector::class)
            ->needs(Client::class)
            ->give(function () {
                return new Client([
                    'base_uri' => config('tm.api_url'),
                    RequestOptions::HEADERS => [
                    ],
                ]);
            });
    }

    public function provides(): array
    {
        return [
            XivApiConnector::class,
        ];
    }
}
