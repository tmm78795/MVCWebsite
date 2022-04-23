<?php

class Admin {

    public $adminName;
    public $password;
    public $name;
    

    public function __construct($adminName, $password, $name) 
    {
        $this->username = $adminName;
        $this->password = $password;
        $this->name = $name;
    }

    public function getAdminName() {
        return $this->adminName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

   

}


?>