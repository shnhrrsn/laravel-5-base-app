<?php namespace App\Bootstrap;

use Illuminate\Contracts\Foundation\Application;

class DetectEnvironment extends \Illuminate\Foundation\Bootstrap\DetectEnvironment {

	public function bootstrap(Application $app) {
		$app->detectEnvironment(function() {
			return isset($_SERVER['APP_ENV']) ? $_SERVER['APP_ENV'] : (stripos(PHP_OS, 'darwin') === false ? 'production' : 'local');
		});
	}

}
