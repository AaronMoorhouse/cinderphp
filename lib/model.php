<?php
require_once("database.php");

class Model extends Database {
    
	protected $model;
 
    function __construct($tname = null) {
        $this->model = strtolower(get_class($this));
		
		if($tname) {
			$this->table = $tname;
		}
		else {
			$this->table = PREFIX . $this->model . "s";
		}
    }
}
?>