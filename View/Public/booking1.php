<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="View/CSS/booking1.css">
</head>
<body>

    <div class="main">
    
    <?php
    echo '<div class="heading">';
    echo "<h2>Select the show date for ".$movie->getTitle()."</h2>";
    
echo '</div>';

    echo  '<div class="movie">';
    echo "<img src='View/Images/image$movieId.jpg' width='200' height='200' /><br>";
    echo '<br><br>';

    echo "<form action='index.php?function=booking2' method='POST'>";
    echo "<input type='hidden' name='movieId' value=".$movieId.">";
    echo "<select name='date'>";
  

    foreach($shows as $show) {
        $date = $show->getshowDate();
        echo "<option value=$date>$date</option>";
 
    }

    echo "</select>";
    echo "<input type='submit' value='Proceed'>";
    echo "</form>";
    echo '</div>';

    ?>
    
<hr>
<div class="link">
<a href='index.php?function=homePage'>Home</a> | <a href='index.php?function=logOut'>Logout</a>
</div>


</div>
</body>
</html>