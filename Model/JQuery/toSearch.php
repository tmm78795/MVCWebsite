<?php

require_once "../connection.php";

$con = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ($con->connect_error)
{
    die("Connection failed: " . $con->connect_error);
}


$data = '';
if(isset($_POST['string'])) {

    $query = "SELECT movieId, title FROM movie WHERE title LIKE '%".$_POST['string']."%'";


    $result = $con->query($query);
    
    
    
    $data = "";
    while($movie = $result->fetch_assoc()) 
    {
      
        $data .=  "<a href='index.php?function=movieProfile&movieId=".$movie['movieId']."'><td>".$movie['title']."</td></a><br>";
      
    }

}

if ($data == "" ) {
    echo "no result";
}
else  {
    echo $data;
}
?>