<?php
if(isset($_GET['url'])) {
	$url = $_GET['url'];
	$urlArray = explode("/", $url);

	if(isset($urlArray[0]) && isset($urlArray[1])) {
		$controller = $urlArray[0];
		array_shift($urlArray);

		if($urlArray[0] != "") {
			$action = $urlArray[0];
		}
		else {
			$action = "index";
		}
		
		array_shift($urlArray);
		
		$params = $urlArray;
	}
	else if(isset($urlArray[0]) xor isset($urlArray[1])) {
		if(isset($urlArray[0])) {
			$controller = $urlArray[0];
			$action = "index";
		}
		else {
			$controller = "pages";
			$action = "error";
		}
		
		$params = array();
	}
}
else {
	$controller = "pages";
	$action = "index";
	$params = array();
}

if(!loadController($controller)) {
	$controller = "pages";
	$action = "error";
	$params = array();
}

define('ROOT', getBaseUrl());
call($controller, $action, $params);

function call($controller, $action, $params) {
	$model = rtrim(ucwords($controller), 's');
	$controllerName = ucwords($controller) . "Controller";
	$dispatch = new $controllerName($model, $controller, $action);
	
	if(method_exists($dispatch, $action)) {
		call_user_func_array(array($dispatch, $action), $params);
	}
	else {
		loadController("pages");
		$dispatch = new PagesController(null, "pages", "error");
		call_user_func_array(array($dispatch, "error"), array());
	}
}

function getBaseUrl() {
	$headers = array(
		'HTTP_X_TUNNEL_SUBDOMAIN',
		'HTTP_X_FORWARDED_HOST',
		'HTTP_X_FORWARDED_SERVER',
		'HTTP_X_ORIGINAL_HOST',
		'HTTP_HOST'
	);

	//Determine host
	$host = 'localhost';

	foreach($headers as $header) {
		if(isset($_SERVER[$header])) {
			if(strpos($_SERVER[$header], 'localhost') === false) {
				if(strpos($_SERVER[$header], '127.0.0.1') === false) {
					$host = $_SERVER[$header];
					break;
				}
			}
		}
	}

	//Check if HTTPS
	if(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
		$protocol = 'https://';
	}
	else if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
		$protocol = 'https://';
	}
	else {
		$protocol = 'http://';
	}

	return $protocol . $host;
}

function loadController($class) {
	$filename = $class . "_controller";
	$path = 'app/controllers/' . $filename . '.php';
	
	if(file_exists($path)) {
		include_once($path);
		return true;
	}
	
	include_once("app/controllers/pages_controller.php");
	return false;
}
?>