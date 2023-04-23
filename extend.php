<?php

namespace Nearata\MaintenanceMode;

use Flarum\Extend;
use Nearata\MaintenanceMode\Api\Controller\AuthController;
use Nearata\MaintenanceMode\Api\Middleware\MaintenanceModeApiMiddleware;
use Nearata\MaintenanceMode\Console\AuthCommand;
use Nearata\MaintenanceMode\Forum\Middleware\MaintenanceModeForumMiddleware;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/less/forum.less'),

    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js')
        ->css(__DIR__.'/less/admin.less'),

    new Extend\Locales(__DIR__.'/locale'),

    (new Extend\View)
        ->namespace('nearata.maintenance-mode', __DIR__.'/views'),

    (new Extend\Middleware('forum'))
        ->add(MaintenanceModeForumMiddleware::class),

    (new Extend\Middleware('api'))
        ->add(MaintenanceModeApiMiddleware::class),

    (new Extend\Console)
        ->command(AuthCommand::class),

    (new Extend\Routes('forum'))
        ->get('/nearata/maintenanceMode/auth/{token}', 'nearata-maintenance-mode.auth', AuthController::class)
];
