<?php

require_once "Model/connection.php";
require_once "Model/User.php";
require_once "Model/Show.php";

class UserModel {
    public $con;

    public function __construct()
    {
        $this->con = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        if ($this->con->connect_error)
        {
            die("Connection failed: " . $this->con->connect_error);
        }
    }
    

    
    public function getUser($username, $password) {

        $query = "SELECT * FROM `user` WHERE username='".$username."' AND password='".$password."'";
        $result = $this->con->query($query);

       
        if($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            $username = $user['username'];
            $password = $user['password'];
            $name = $user['name'];
            $email = $user['email'];
            $mobileNumber = $user['mobileNumber'];
            $obj = new User($username, $password, $name, $email, $mobileNumber);

            return $obj;
        }

        else {
            return false;
        }

    }


    public function addUser($username, $password, $name, $email, $mobileNumber) {

        $user = New User($username, $password, $name, $email, $mobileNumber);

        $query = "INSERT INTO `user` VALUES ('".$username."','".$password."','".$name."','".$email."','".$mobileNumber."')";
        if($this->con->query($query))
        {
           return $user;
        }
        else 
        {
            return false;
        }

    }


    public function getBookings($username) {

    }

    

}

?>