<?php

require_once "../connection.php";

$con = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ($con->connect_error)
{
    die("Connection failed: " . $con->connect_error);
}

if(isset($_GET['date']) && isset($_GET['movieId'])) {

    $movieId = $_GET['movieId'];
    $date = $_GET['date'];


    $query = "SELECT TIME(`showTime`) AS `time`
    FROM `show` 
    WHERE `movieId` = $movieId AND DATE(`showTime`) = '$date'";

    $result = $con->query($query);

    $data = "";

    $data .= "<div class='form-group' id='showTime'>";
    $data .= "<label >Select Time:</label>";
    $data .= "<select name='showTime'>";
    

    while($time = $result->fetch_assoc()) 
    {
      
        $data .=  "<option value='".$time['time']."'>".$time['time']."</option>";
      
    }

    $data .= "</select>";
    $data .= "</div>";


    $data .= "<div class='form-group' id='seats'>";
    $data .= "<label >Select Seats:</label>";
    $data .= "<select name='seats'>";

    $i = 1;
    while($i < 10) {
        $data .= "<option value='$i'>$i</option>";
        $i++;
    }
    $data .="</select>";
    $data .= "</div>";

    $data .= "<div class='form-group' id='submitButton'>";
    $data .= "<input type='submit' value='Book Now' class='btn btn-success'>";
    $data .= "</div>";

}

echo $data;

?>