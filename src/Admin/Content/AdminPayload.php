<?php

namespace Nearata\MaintenanceMode\Admin\Content;

use Flarum\Frontend\Document;
use Nearata\MaintenanceMode\Foundation\Config;
use Psr\Http\Message\ServerRequestInterface;

class AdminPayload
{
    /**
     * @var Config
     */
    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function __invoke(Document $document, ServerRequestInterface $request)
    {
        $document->payload['nearataMaintenanceMode'] = $this->config->inMaintenanceMode();
    }
}
