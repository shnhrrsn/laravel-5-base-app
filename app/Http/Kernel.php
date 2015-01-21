<?php namespace App\Http;

use Illuminate\Routing\Router;
use Illuminate\Contracts\Foundation\Application;

class Kernel extends \Illuminate\Foundation\Http\Kernel {

	protected $middleware = [
		// 'Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode',
		'Illuminate\Cookie\Middleware\EncryptCookies',
		'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
		'Illuminate\Session\Middleware\StartSession',
		'Illuminate\View\Middleware\ShareErrorsFromSession',
		'Illuminate\Foundation\Http\Middleware\VerifyCsrfToken',
	];

	protected $routeMiddleware = [

	];

	public function __construct(Application $app, Router $router) {
		$this->bootstrappers[0] = 'App\Bootstrap\DetectEnvironment';
		$this->bootstrappers[1] = 'App\Bootstrap\LoadConfiguration';

		parent::__construct($app, $router);
	}

}
