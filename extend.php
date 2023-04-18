<?php

namespace Nearata\MaintenanceMode;

use Flarum\Extend;
use Nearata\MaintenanceMode\Api\Middleware\MaintenanceModeApiMiddleware;
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
        ->add(MaintenanceModeApiMiddleware::class)
];
