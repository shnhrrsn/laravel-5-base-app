<?php namespace App\Console;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Console\Scheduling\Schedule;

class Kernel extends \Illuminate\Foundation\Console\Kernel {

	protected $commands = [

	];

	protected function schedule(Schedule $schedule) {

	}

	public function bootstrap() {
		parent::bootstrap();

		$this->app->singleton('command.key.generate', \App\Console\Commands\KeyGenerateCommand::class);
	}

}
