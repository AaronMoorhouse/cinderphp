<?php
class Template {
	
	protected $vars = array();
	protected $controller;
	protected $action;
	
	public function __construct($controller, $action) {
		$this->controller = strtolower($controller);
		$this->action = $action;
	}
	
	public function set($key, $value) {
		$this->vars[$key] = $value;
	}

	public function insertTemplate($template) {
		if(file_exists('app/views/' . $template . '.php')) {
			require_once('app/views/' . $template . '.php');
		}
		else {
			echo "ERROR: Template '$template' not found.";
		}
	}
	
	public function render() {
		extract($this->vars);
		
		if(file_exists('app/views/' . $this->controller . '/header.php')) {
			require_once('app/views/' . $this->controller . '/header.php');
		}
		else {
			require_once('app/views/header.php');
		}
		
		require_once('app/views/' . $this->controller . '/' . $this->action . '.php');
		
		if(file_exists('app/views/' . $this->controller . '/footer.php')) {
			require_once('app/views/' . $this->controller . '/footer.php');
		}
		else {
			require_once('app/views/footer.php');
		}
	}
}
?>