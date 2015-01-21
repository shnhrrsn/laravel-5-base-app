<?php namespace App\Console;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Console\Scheduling\Schedule;

class Kernel extends \Illuminate\Foundation\Console\Kernel {

	protected $commands = [
		'App\Console\Commands\Inspire',
	];

	public function __construct(Application $app, Dispatcher $events) {
		$this->bootstrappers[0] = 'App\Bootstrap\DetectEnvironment';
		$this->bootstrappers[1] = 'App\Bootstrap\LoadConfiguration';

		parent::__construct($app, $events);
	}

	protected function schedule(Schedule $schedule) {
		$schedule->command('inspire')->hourly();
	}

}
