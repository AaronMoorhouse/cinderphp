<?php
require_once("database.php");

class Model extends Database {
    
	protected $model;
 
    function __construct($tname = null, $jsonFile = null) {
        $this->model = strtolower(get_class($this));
		
		if($tname) {
			$this->table = $tname;
		}
		else {
			$this->table = PREFIX . $this->model . "s";
		}

		if($jsonFile) {
			if(file_exists('app/data/' . $jsonFile . '.json')) {
				$this->json = file_get_contents('app/data/' . $jsonFile . '.json');
			}
			else {
				exit("The specified JSON file was not found: $jsonFile.json");
			}
		}
    }
}
?>