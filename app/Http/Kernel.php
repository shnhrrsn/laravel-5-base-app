<?php namespace App\Http;

use Illuminate\Routing\Router;
use Illuminate\Contracts\Foundation\Application;

class Kernel extends \Illuminate\Foundation\Http\Kernel {

	protected $middleware = [
        // \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Cookie\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
	];

	protected $routeMiddleware = [

	];

}
