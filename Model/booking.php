<?php

require_once "Model/connection.php";

class Booking {

    public $con;

    public function __construct()
    {
        $this->con = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        if ($this->con->connect_error)
        {
            die("Connection failed: " . $this->con->connect_error);
        }
    }

    public function deleteBooking($username, $movieId, $date, $time, $seats) {

        $query1 = "DELETE FROM `ticket` WHERE `username` = '".$username."' 
            AND `movieId` = '".$movieId."' AND DATE(`movieTime`) = '".$date."' AND TIME(`movieTime`) = '".$time."'
             AND `seats` = '".$seats."'";

        $this->con->query($query1);

        $query2 = "UPDATE `show` SET `seats` = `seats` + $seats 
            WHERE `movieId` = '".$movieId."' AND DATE(`showTime`) = '".$date."' AND TIME(`showTime`) = '".$time."'";

        $this->con->query($query2);

       

    }



}


?>