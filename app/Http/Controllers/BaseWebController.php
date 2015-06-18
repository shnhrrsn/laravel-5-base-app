<?php namespace App\Http\Controllers;

abstract class BaseWebController extends BaseController {

	public function __construct() {
		parent::__construct();

		$html = $this->app['html'];
		$form = $this->app['form'];

		$this->app['view']->share('html', $html);
		$this->app['view']->share('form', $form);
	}

}
