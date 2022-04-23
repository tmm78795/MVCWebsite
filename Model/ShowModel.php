<?php


require_once "Model/connection.php";
require_once "Model/Show.php";

class ShowModel {

    public $con;

    public function __construct()
    {
        $this->con = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        if ($this->con->connect_error)
        {
            die("Connection failed: " . $this->con->connect_error);
        }
    }


    public function getAllShow($movieId) {
        

        $query = "SELECT * FROM `show` WHERE movieId=$movieId";
        $result = $this->con->query($query);

        $shows = array();

        while($show = $result->fetch_assoc()) {

            $showDate = explode(" ", $show['showTime'])[0];
            $showTime = explode(" ", $show['showTime'])[1];

            $seats = $show['seats'];

            $showObj = new Show($movieId, $showDate, $showTime, $seats);

            if(count($shows) === 0)
            {
                array_push($shows, $showObj);
            }

            foreach($shows as $show) {
                if($show->isSame($showObj) == false ) 
                {
                    array_push($shows, $showObj);
                }
            }

            

            
        }

        if(count($shows) > 0) 
        {
            return $shows;
        }

        else 
        {
            return false;
        }

    }


    public function dateShows($movieId, $date) {

        $query = "SELECT * FROM `show` WHERE DATE(showTime) ='".$date."' AND `movieId` = '".$movieId. "'";
        $result = $this->con->query($query);  

        $shows = array();

        while($show = $result->fetch_assoc()) {

            $showDate = explode(" ", $show['showTime'])[0];
            $showTime = explode(" ", $show['showTime'])[1];

            $seats = $show['seats'];

            $showObj = new Show($movieId, $showDate, $showTime, $seats);

            array_push($shows, $showObj);
           


        }

        
        if(count($shows) > 0) 
        {
            return $shows;
        }

        else 
        {
            return false;
        }

    }



    // for booking 

    public function booking($movie, $date, $time, $seats) {

        $username = $_SESSION['username'];
        $movieId = $movie->getMovieId();
        $dateTime = $date." ".$time;
        $seats = $seats;

        // 1st query to add in tickets
        $query = "INSERT INTO `ticket` VALUES('".$username."','".$movieId."','".$dateTime."','".$seats."')";

        if($this->con->query($query)) {
            
            // to update the seats in show table
            $query = "UPDATE `show` SET `seats` =`seats`-".$seats." WHERE `showTime` ='".$dateTime."'";
            $this->con->query($query);

            return true;
        }

        else {
            return false;
        }

    }


    // to get bookings of a user 
    public function getMyBookings($username) {

        $query = "SELECT DATE(`ticket`.`movieTime`) AS `date`, TIME(`ticket`.`movieTime`) AS `time`,
        `ticket`.`seats`, `movie`.`title`, `movie`.`movieId`
        FROM `ticket`
        INNER JOIN `movie` ON`ticket`.`movieId` = `movie`.`movieId`
         WHERE `ticket`.`username` = '".$username."';";
        $result = $this->con->query($query);

        $shows = array();

        if($result->num_rows > 0) {

            while($show = $result->fetch_assoc()) {
                array_push($shows, $show);
            }

        }

        return $shows;
        

    }
}

?>