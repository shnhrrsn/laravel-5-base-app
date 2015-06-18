<?php namespace App\Console;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Console\Scheduling\Schedule;

class Kernel extends \Shnhrrsn\LaravelSupport\Console\Kernel {

	protected $commands = [

	];

	protected function schedule(Schedule $schedule) {

	}

	public function bootstrap() {
		parent::bootstrap();

		//
	}

}
