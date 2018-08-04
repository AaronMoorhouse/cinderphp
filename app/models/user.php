<?php
    require_once('lib/database.php');
    require_once('lib/model.php');

    class User extends Model {
        
        public function getUsers() {
            $this->connect();
            $users = $this->selectAll();
            $this->disconnect();

            return $users;
        }
    }
?>