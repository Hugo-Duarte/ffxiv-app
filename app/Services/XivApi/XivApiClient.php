<?php

namespace App\Services\XivApi;

use App\Services\XivApi\Adapter\XivApiAdapter;

class XivApiClient
{
    protected XivApiAdapter $adapter;

    public function __construct(XivApiAdapter $xivApiAdapter)
    {
        $this->adapter = $xivApiAdapter;
    }
}
