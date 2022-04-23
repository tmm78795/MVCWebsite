<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>



<body>
<!-- Navbar-->



<nav class='navbar navbar-inverse '>

<div class="container-fluid">
  <div class="navbar-header">
    <a href="#" class="navbar-brand">
      Cinema+
    </a>
  </div>
  <ul class="nav navbar-nav">
    <li ><a href="index.php?function=invoke">Home</a></li>
    

  </ul>
  <form class="navbar-form navbar-left" action="/action_page.php">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Search">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="index.php?function=logOut"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
  </ul>
</div>
</nav>



<div class="container-fluid">


<h1 class='text-center'>Booking Information</h1>


</div>


<br>

<?php

        $size = count($shows);
        if($size  > 0) {
echo '<div class="table">';
            echo "<table style='width:80%';>";
            echo "<tr>";
            echo "<th>Movie Title</th>";
            echo "<th>Show Date</th>";
            echo "<th>Show Time</th>";
            echo "<th>Seats</th>";
            echo "</tr>";
            

            for($i= 0; $i < $size; $i++)
            {
                echo "<tr>";
                echo "<td><a href=index.php?function=selectedMovie&movieId=".$shows[$i]['movieId'].">".$shows[$i]['title']."</a></td>";
                echo "<td>".$shows[$i]['date']."</td>";
                echo "<td>".$shows[$i]['time']."</td>";
                echo "<td>".$shows[$i]['seats']."</td>";
                echo "</tr>";
            }

           
            echo "</table>";
    echo'</div>';
        }

        else {
            echo "<hr><h3 class='text-center'>No bookings Yet</h3>";
        }

    ?>


</div>
</body>
</html>