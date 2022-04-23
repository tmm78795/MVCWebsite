<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/CSS/booking2.css" class="CSS">
    
    <title>Document</title>
</head>
<body>
<div class="main">
    <?php
        echo '<div class="heading">';
        echo "<h2>Select showtime and seats for ".$movie->getTitle()." for date: ".$date."</h2>";
     echo '</div>';

echo  '<div class="movie">';
 echo "<img src='View/Images/image$movieId.jpg' width='190' height='190' />";
        echo "<form action='index.php?function=booking3' method='post'>";
        echo "<input type='hidden' name='movieId' value=".$movieId.">";
        echo "<input type='hidden' name='date' value=".$date.">";

        echo "ShowTime:";
        echo "<select name='time'>";

        
        foreach($shows as $show) {
        $time = $show->getShowTime();
        echo "<option value='".$time."'>".$time."</option>";
            

        }
        echo "</select><br><br>";
        echo "Seats:";
        echo "<select name='seats'>";

        for($i=1; $i < 11; $i++) {

        echo "<option value=$i>$i</option>";
            

        }



        echo "</select>";
        echo "<br><br><input type='submit' value='Book Now'>";
        echo "</form>";

echo '</div>';

    ?>

<hr>
<div class="link">

<a href='index.php?function=homePage'>Home</a> | <a href='index.php?function=logOut'>Logout</a>
</div>

</div >
</body>
</html> 