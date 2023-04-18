<?php

namespace Nearata\MaintenanceMode\Middleware;

use Flarum\Foundation\Config;
use Flarum\Locale\Translator;
use Illuminate\Contracts\View\Factory;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Tobscure\JsonApi\Document;

abstract class AbstractMiddleware implements MiddlewareInterface
{
    /**
     * @var bool
     */
    protected $isApiRequest = false;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Factory
     */
    protected $view;

    /**
     * @var Translator
     */
    protected $translator;

    public function __construct(Config $config, Factory $view, Translator $translator)
    {
        $this->config = $config;
        $this->view = $view;
        $this->translator = $translator;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if (!$this->inMaintenanceMode()) {
            return $handler->handle($request);
        }

        if ($this->isApiRequest) {
            return $this->apiResponse();
        }

        return new HtmlResponse($this->view->make('nearata.maintenance-mode::default')->render(), 503);
    }

    private function apiResponse(): ResponseInterface
    {
        return new JsonResponse(
            (new Document())->setErrors([
                'status' => '503',
                'title' => $this->translator->get('nearata-maintenance-mode.ref.title')
            ]),
            503,
            ['Content-Type' => 'application/vnd.api+json']
        );
    }

    private function inMaintenanceMode()
    {
        return $this->config['nearataMaintenanceMode'] ?? false;
    }
}
