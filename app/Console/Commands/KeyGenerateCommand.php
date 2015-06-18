<?php namespace App\Console\Commands;

class KeyGenerateCommand extends \Illuminate\Foundation\Console\KeyGenerateCommand {

	public function fire() {
		$key = $this->getRandomKey($this->laravel['config']['app.cipher']);

		if ($this->option('show')) {
			return $this->comment($key);
		}

		list($path, $contents) = $this->getKeyFile();

		$contents = str_replace($this->laravel['config']['app.key'], $key, $contents);
		$this->laravel['files']->put($path, $contents);

		$this->laravel['config']['app.key'] = $key;

		$this->info('Application key [' . $key . '] set successfully.');
	}

	protected function getKeyFile() {
		$env = $this->option('env') ? $this->option('env') . '/' : '';

		$path = $this->laravel['path.config'] . '/' . $env . 'app.php';
		$contents = $this->laravel['files']->get($path);

		return [ $path, $contents ];
	}

}
