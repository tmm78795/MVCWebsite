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





<br>

<?php
        $pSize = count($pastShows);
        $uSize = count($upcomingShows);

        if ($pSize < 1 && $uSize < 1) {
          
            echo "<hr><h3 class='text-center'>No bookings Yet</h3>";
        
        }
        if($pSize  > 0) {
            echo '<div >';
            echo "<table class='table table-hover'>";
            echo "<h2>Past Shows</h2>";
            echo "<tr>";
            echo "<th>Movie Title</th>";
            echo "<th>Show Date</th>";
            echo "<th>Show Time</th>";
            echo "<th>Seats</th>";
            echo "</tr>";
            

            for($i= 0; $i < $pSize; $i++)
            {
                echo "<tr>";
                echo "<td><a href=index.php?function=selectedMovie&movieId=".$pastShows[$i]['movieId'].">".$pastShows[$i]['title']."</a></td>";
                echo "<td>".$pastShows[$i]['date']."</td>";
                echo "<td>".$pastShows[$i]['time']."</td>";
                echo "<td>".$pastShows[$i]['seats']."</td>";
                echo "</tr>";
            }

           
            echo "</table>";
            echo'</div>';
        }

        echo "<br><hr>";
        if($uSize  > 0) {
          echo '<div >';
          echo "<table class='table table-hover'>";
          echo "<h2>Upcoming Shows</h2>";
          echo "<tr>";
          echo "<th>Movie Title</th>";
          echo "<th>Show Date</th>";
          echo "<th>Show Time</th>";
          echo "<th>Seats</th>";
          echo "<th>Delete Booking</th>";
          echo "</tr>";
          

          for($i= 0; $i < $uSize; $i++)
          {
              echo "<tr>";
              echo "<td><a href=index.php?function=selectedMovie&movieId=".$upcomingShows[$i]['movieId'].">".$upcomingShows[$i]['title']."</a></td>";
              echo "<td>".$upcomingShows[$i]['date']."</td>";
              echo "<td>".$upcomingShows[$i]['time']."</td>";
              echo "<td>".$upcomingShows[$i]['seats']."</td>";
              echo "<td>";
              echo "<form action='index.php?function=deleteBooking' method='post'>";
              echo "<input type='hidden' name='movieId' value='".$upcomingShows[$i]['movieId']."'>";
              echo "<input type='hidden' name='date' value='".$upcomingShows[$i]['date']."'>";
              echo "<input type='hidden' name='time' value='".$upcomingShows[$i]['time']."'>";
              echo "<input type='hidden' name='seats' value='".$upcomingShows[$i]['seats']."'>";
              echo '<button type="submit"><span class="glyphicon glyphicon-remove"></span></button>';
              echo "</form>";
              echo "</td>";
              echo "</tr>";
          }

         
          echo "</table>";
          echo'</div>';
      }



    ?>


</div>
</body>
</html>