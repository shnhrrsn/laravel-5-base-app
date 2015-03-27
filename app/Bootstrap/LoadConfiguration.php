<?php namespace App\Bootstrap;

use Illuminate\Config\Repository;
use Symfony\Component\Finder\Finder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Config\Repository as RepositoryContract;

class LoadConfiguration extends \Illuminate\Foundation\Bootstrap\LoadConfiguration {

	protected function loadConfigurationFiles(Application $app, RepositoryContract $config) {
		foreach($this->getConfigurationFiles($app) as $key => $paths) {
			$config->set($key, require $paths[0]);

			if(count($paths) > 1) {
				foreach($paths as $i => $path) {
					if($i === 0) continue;

					$values = require $paths[$i];
					$config->set($key, array_replace_recursive($config->get($key), $values));
				}
			}
		}
	}

	protected function getConfigurationFiles(Application $app) {
		$configPath = str_finish($app->configPath(), '/');
		$files = $this->getConfigurationFilesInPath($configPath);

		foreach(explode('.', $app->environment()) as $env) {
			$configPath .= $env . '/';
			$files = array_merge_recursive($files, $this->getConfigurationFilesInPath($configPath));
		}

		return $files;
	}

	private function getConfigurationFilesInPath($configPath) {
		$files = [ ];

		if(file_exists($configPath)) {
			foreach(Finder::create()->files()->depth(0)->name('*.php')->in($configPath) as $file) {
				$files[basename($file->getRealPath(), '.php')] = [ $file->getRealPath() ];
			}
		}

		return $files;
	}

}