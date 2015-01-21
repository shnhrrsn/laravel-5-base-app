<?php namespace App\Http\Routing;

class ControllerDispatcher extends \Illuminate\Routing\ControllerDispatcher {

	protected function resolveClassMethodDependencies(array $parameters, $instance, $method) {
		if(config('app.controller_ioc')) {
			return parent::resolveClassMethodDependencies($parameters, $instance, $method);
		} else {
			return $parameters;
		}
	}

}