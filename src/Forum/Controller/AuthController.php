<?php

namespace Nearata\MaintenanceMode\Forum\Controller;

use Flarum\Http\SessionAccessToken;
use Flarum\Http\SessionAuthenticator;
use Flarum\Http\UrlGenerator;
use Illuminate\Support\Arr;
use Laminas\Diactoros\Response\RedirectResponse;
use Nearata\MaintenanceMode\Foundation\Settings;
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
     * @var Settings
     */
    protected $settings;

    public function __construct(UrlGenerator $url, SessionAuthenticator $authenticator, Settings $settings)
    {
        $this->url = $url;
        $this->authenticator = $authenticator;
        $this->settings = $settings;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $redirect = new RedirectResponse($this->url->to('forum')->base());

        if (!$this->settings->inMaintenanceMode()) {
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
