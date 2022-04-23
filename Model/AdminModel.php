<?php

require_once "Model/connection.php";
require_once "Model/Admin.php";

class AdminModel {

    public $con;

    public function __construct()
    {
        $this->con = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD,DB_DATABASE);
        if ($this->con->connect_error)
        {
            die("Connection failed: " . $this->con->connect_error);
        }
    }


    public function getAdmin($adminName, $password) {

        $query = "SELECT * FROM `admin` WHERE adminName='".$adminName."' AND password='".$password."'";
        $result = $this->con->query($query);

       
        if($result->num_rows == 1) {
            $admin = $result->fetch_assoc();
            $adminName = $admin['adminName'];
            $password = $admin['password'];
            $name = $admin['name'];
            
            $obj = new Admin($adminName, $password, $name);

            return $obj;
        }

        else {
            return false;
        }

    }


    public function addAdmin($adminName, $password, $name) {

        $admin = New Admin($adminName, $password, $name);

        $query = "INSERT INTO `admin` VALUES ('".$admin->getAdminName()."','".$admin->getPassword()."','".$admin->getName()."')";
        if($this->con->query($query))
        {
           return $admin;
        }
        else 
        {
            return false;
        }

    }




}



?>