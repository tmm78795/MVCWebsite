<?php

class User {

    public $username;
    public $password;
    public $name;
    public $email;
    public $mobileNumber;

    public function __construct($username, $password, $name, $email, $number) 
    {
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->email = $email;
        $this->mobileNumber = $number;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMobileNumber() {
        return $this->mobileNumber;
    }

}


?>