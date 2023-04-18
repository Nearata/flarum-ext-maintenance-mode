<?php

namespace Nearata\MaintenanceMode\Api\Middleware;

use Nearata\MaintenanceMode\Middleware\AbstractMiddleware;

class MaintenanceModeApiMiddleware extends AbstractMiddleware
{
    protected $isApiRequest = true;
}
