<?php namespace App\Providers;

class ControllerServiceProvider extends \Illuminate\Routing\ControllerServiceProvider {

	public function register() {
		$this->app->singleton('illuminate.route.dispatcher', function($app) {
			return new \App\Http\Routing\ControllerDispatcher($app['router'], $app);
		});
	}


}