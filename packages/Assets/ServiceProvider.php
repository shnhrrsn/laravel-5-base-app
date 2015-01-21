<?php namespace Assets;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

	public function register() {
		$this->app->singleton('command.assets.publish', function($app) {
			return new Console\PublishCommand($app['cache']);
		});

		$this->app->singleton('command.assets.unpublish', function($app) {
			return new Console\UnpublishCommand($app['files'], $app['composer']);
		});
	}

	public function boot() {
		$router = $this->app['router'];

		$router->get('assets/img/{a?}/{b?}/{c?}/{d?}/{e?}', '\Assets\Http\Controller@img');
		$router->get('assets/font/{a?}/{b?}/{c?}/{d?}/{e?}', '\Assets\Http\Controller@font');
		$router->get('assets/fonts/{a?}/{b?}/{c?}/{d?}/{e?}', '\Assets\Http\Controller@font');
		$router->get('assets/css/{a?}/{b?}/{c?}/{d?}/{e?}', '\Assets\Http\Controller@css');
		$router->get('assets/js/{a?}/{b?}/{c?}/{d?}/{e?}', '\Assets\Http\Controller@js');
		$router->get('assets/{type}/{a?}/{b?}/{c?}/{d?}/{e?}', '\Assets\Http\Controller@compile');

		$this->commands('command.assets.publish', 'command.assets.unpublish');

		$this->app['view']->getEngineResolver()->resolve('blade')->getCompiler()->extend(function($view, $compiler) {
			$pattern = $compiler->createMatcher('assetPath');

			return preg_replace_callback($pattern, function($m) {
				$path = trim($m[2]);
				$path = substr($path, 1, strlen($path) - 2); // Remove parenthesis

				if($path{0} === '\'' || $path{0} === '"') {
					$path = substr($path, 1, strlen($path) - 2); // Remove quotes
				}

				return Asset::publishedPath($path);
			}, $view);
		});

		if(class_exists('\Illuminate\Html\HtmlBuilder')) {
			\Illuminate\Html\HtmlBuilder::macro('assetPath', function($path) {
				return Asset::publishedPath($path);
			});
		}
	}

}
