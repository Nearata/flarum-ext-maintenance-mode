<?php

namespace Nearata\MaintenanceMode\Console;

use Flarum\Console\AbstractCommand;
use Flarum\Http\SessionAccessToken;
use Flarum\Http\UrlGenerator;
use Nearata\MaintenanceMode\Foundation\Settings;
use Symfony\Component\Console\Input\InputArgument;

class AuthCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('nearataMaintenanceMode:auth')
            ->addArgument('user-id', InputArgument::REQUIRED);
    }

    protected function fire()
    {
        /** @var Settings */
        $settings = resolve(Settings::class);

        if (!$settings->inMaintenanceMode()) {
            return $this->error('The Maintenance Mode is OFF');
        }

        $userId = (int) $this->input->getArgument('user-id');

        if (!$userId) {
            return $this->error('User not found.');
        }

        $token = SessionAccessToken::generate($userId);

        /** @var UrlGenerator */
        $generator = resolve(UrlGenerator::class);

        $url = $generator->to('forum')->path("nearata/maintenanceMode/auth/$token->token");

        $this->info("URL to Authenticate: $url");
    }
}
