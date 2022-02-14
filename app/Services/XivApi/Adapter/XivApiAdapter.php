<?php

namespace App\Services\XivApi\Adapter;

use App\Services\XivApi\Connector\XivApiConnector;

class XivApiAdapter
{
    protected XivApiConnector $connector;

    public function __construct(XivApiConnector $connector)
    {
        $this->connector = $connector;
    }

    public function searchCharacter($data)
    {
        return $this->connector->fetchData('GET',  '/character/search', null);
    }

    public function getCharacter(string $lodestoneId, $data)
    {
        return $this->connector->fetchData('GET',  '/character/' . $lodestoneId, null);
    }

}
