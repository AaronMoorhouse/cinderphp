<?php
include_once("lib/controller.php");

class UsersController extends Controller {
	
	public function index() {
		$users = $this->model->getUsers();

		$this->set('title', 'Users - CinderPHP');
		$this->set('users', $users);
	}
}
?>