<?php

require_once "./connection.php";

$con = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ($con->connect_error)
{
    die("Connection failed: " . $con->connect_error);
}


$data = '';
if(isset($_POST['data'])) {

    $query = "SELECT movieId, title FROM movie WHERE title LIKE '%".$_POST['data']."%'";


    $result = $con->query($query);
    
    
    
    $data = "";
    while($movie = $result->fetch_assoc()) 
    {
      
        $data .=  "<a href='#'><td>".$movie['title']."</td></a><br>";
      
    }

}


echo $data;
?>