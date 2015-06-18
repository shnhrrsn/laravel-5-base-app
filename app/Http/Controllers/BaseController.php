<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController extends \Illuminate\Routing\Controller {

	protected $request;
	protected $app;

	public function __construct() {
		$this->app = app();
		$this->request = $this->app[Request::class];
	}

}
