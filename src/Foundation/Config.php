<?php

namespace Nearata\MaintenanceMode\Foundation;

use Flarum\Foundation\Config as FlarumConfig;

class Config
{
    /**
     * @var FlarumConfig
     */
    private $config;

    public function __construct(FlarumConfig $config)
    {
        $this->config = $config;
    }

    public function inMaintenanceMode(): bool
    {
        return $this->config['nearataMaintenanceMode'] ?? false;
    }
}
