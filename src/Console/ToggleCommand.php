<?php

namespace Nearata\MaintenanceMode\Console;

use Flarum\Console\AbstractCommand;
use Flarum\Settings\SettingsRepositoryInterface;
use Symfony\Component\Console\Input\InputArgument;

class ToggleCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('nearataMaintenanceMode:toggle')
            ->addArgument('boolean', InputArgument::REQUIRED);
    }

    protected function fire()
    {
        $value = $this->input->getArgument('boolean');

        if (!($value == 'true' || $value == 'false')) {
            return $this->error('The argument has to be "true" or "false" !!');
        }

        $value = $value == 'true' ? true : false;

        /** @var SettingsRepositoryInterface */
        $settings = resolve(SettingsRepositoryInterface::class);

        $settings->set('nearata-maintenance-mode.enabled', $value);

        if ($value) {
            $this->info('Maintenance is ON');
        } else {
            $this->info('Maintenance is OFF');
        }
    }
}
