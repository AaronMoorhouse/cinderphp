<?php
include_once("lib/controller.php");

class PagesController extends Controller {
	
	public function __construct($model, $controller, $action) {
		Controller::__construct(null, $controller, $action);
	}
	
	public function index() {
		$this->set('title', 'Home - CinderPHP');
	}
	
	public function error() {
		$this->set('title', 'Error');
	}
}
?>