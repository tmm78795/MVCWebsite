<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="View/CSS/selectedMovie.css">
</head>

 <div class="main">
<body>

    <?php
    $movieId = $movie->getMovieId();
    $movieTitle = $movie->getTitle();
    $movieLength = $movie->getLength();
    $releaseDate = $movie->getReleaseDate();   
    $description = $movie->getDescription();
    $price = $movie->getPrice();


    echo "<h2>About Movie $movieTitle</h2>";
    echo "<div class='des'>";
    echo "<img src='View/Images/image$movieId.jpg' width='150' height='150' >";
    
    echo "<div class='word'>";
    echo"$description";
    echo '<br>';
    echo"length = $movieLength";
    echo '<br>';
    echo"Release Date =$releaseDate ";
    echo '<br>';
    echo"Price = $$price";
    echo '<br>';
    echo "</div>";
    echo "</div>";


    echo '<div class="footer">';
    echo "<p>To book the tickets please  <a href ='index.php?function=booking1&movieId=$movieId'>Click here</a></p>";


    ?>
  


<a href='index.php?function=homePage'>Home</a> | <a href='index.php?function=logOut'>Logout</a>
</div>

</body>

</div>
</html>