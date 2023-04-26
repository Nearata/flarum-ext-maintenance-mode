<?php

namespace Nearata\MaintenanceMode\Api\Controller;

use Flarum\Http\SessionAccessToken;
use Flarum\Http\SessionAuthenticator;
use Flarum\Http\UrlGenerator;
use Illuminate\Support\Arr;
use Laminas\Diactoros\Response\RedirectResponse;
use Nearata\MaintenanceMode\Foundation\Config;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthController implements RequestHandlerInterface
{
    /**
     * @var UrlGenerator
     */
    protected $url;

    /**
     * @var SessionAuthenticator
     */
    protected $authenticator;

    /**
     * @var Config
     */
    protected $config;

    public function __construct(UrlGenerator $url, SessionAuthenticator $authenticator, Config $config)
    {
        $this->url = $url;
        $this->authenticator = $authenticator;
        $this->config = $config;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirect = new RedirectResponse($this->url->to('forum')->base());

        if (!$this->config->inMaintenanceMode()) {
            return $redirect;
        }

        $token = SessionAccessToken::findValid(Arr::get($request->getQueryParams(), 'token'));

        if (is_null($token)) {
            return $redirect;
        }

        $session = $request->getAttribute('session');

        $this->authenticator->logIn($session, $token);

        return $redirect;
    }
}
