<?php

namespace Nearata\MaintenanceMode\Foundation;

use Flarum\Settings\SettingsRepositoryInterface;

class Settings
{
    /**
     * @var SettingsRepositoryInterface
     */
    private $settings;

    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    public function inMaintenanceMode(): bool
    {
        return (bool) $this->settings->get('nearata-maintenance-mode.enabled');
    }
}
