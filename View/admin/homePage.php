<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>admin Home</title>
</head>
<body>
    

<!-- Navbar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Cinema+ Admin Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="index1.php?function=newMovie">Add New Moview</a></li>
      <!-- <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li> -->
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
      <li><a href="index1.php?function=logOut"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>


<!-- Show All Movies -->

<?php
    if(count($movies) > 0) {

        echo "<table class='table table-condensed table-responsive table-bordered'>";
        echo"<thead>
            <tr>
          <th>Image</th>
          <th>Title</th>
          <th>Release Date</th>
          <th>Update</th>
          <th>Remove Movie</th>
            </tr>
            </thead>
            <tbody>";

        
        echo "</tbody>";

        foreach($movies as $movie) {

            echo "<tr>";
            echo "<td><img style='width:100px; height:60px' src='".$movie->getPathInfo()."' alt='image'></td>";
            echo "<td>".$movie->getTitle()."</td>";
            echo "<td>".$movie->getReleaseDate()."</td>";
            echo "<td><a href='index1.php?function=movieProfile&movieId=".$movie->getMovieId()."'>Update</a></td>";
            echo "<td><a href='index1.php?function=deleteMovie&movieId=".$movie->getMovieId()."'>Remove</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

?>

</body>
</html>