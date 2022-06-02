<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .row img {
            width: 320px;
            height: 320px;
        }
    </style>
</head>

<body>

    <!-- Navbar-->
    <nav class='navbar navbar-inverse'>

<div class="container-fluid">
  <div class="navbar-header">
    <a href="#" class="navbar-brand">
      Cinema+
    </a>
  </div>
  <ul class="nav navbar-nav">
    <li><a href="index.php?function=invoke">Home</a></li>
    <?php
    if ($isLoggedIn) {
      echo "<li><a href='index.php?function=myAccount'>MyAccount</a></li>";
    }
    ?>

  </ul>
  <form class="navbar-form navbar-left" action='#'>
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Search" id='toSearch'>
    </div>
    
    <div id='searchResult'></div>
  </form>
  
  <ul class="nav navbar-nav navbar-right">
    <?php

    if ($isLoggedIn) {
      echo '<li><a href="index.php?function=logOut"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
    } else {
      echo '<li><a href="index.php?function=signIn"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
      echo '<li><a href="index.php?function=signUp"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>';
    }
    ?>

  </ul>
</div>
</nav>


    <div class="container">

        <?php
        $movieId = $movie->getMovieId();
        $movieTitle = $movie->getTitle();
        $movieLength = $movie->getLength();
        $releaseDate = $movie->getReleaseDate();
        $description = $movie->getDescription();
        $price = $movie->getPrice();
        $pathInfo = $movie->getPathInfo();




        ?>

        <div class="row">
            <div class="col-sm-6"><img src="<?php echo $pathInfo ?>" alt="sorry image not found"></div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <h1><?php echo $movieTitle ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h3><?php echo $description ?></h3>
                    </div>
                </div>
            </div>

        </div>

        <br>

        <div class="well text-center">
            <h3 >Book Here:</h3>
            <?php
            if (!$isLoggedIn) { ?>
                <div class=" text-center"><a href='index.php?function=signIn' class="btn btn-default">Please Login to book show</a></div>

            <?php } else { ?>
                <div>
                    <form action="index.php?function=booking" method="post" class="showBooking text-center" id="mainForm">

                        <input type="hidden" name="movieId" id="movieId" value=<?php echo $movieId?>>
                        
                        <div class="form-group">
                            <label >Select Date:</label>
                            
                            <select name="showDate" id="showDate">
                                <option value="#">Select date</option>
                                
                                <?php foreach($dates as $date) {  ?>

                                    <option id = "date" value=<?php echo $date['date']?>> <?php echo $date['date'] ?> </option>
                                    
                                <?php } ?>

                            </select>

                        </div>
                        <div class="form-group" id="forShowTime">
                            
                                
                        </div>

                        <div class="form-group" id="forSeats">
                            
                                
                        </div>

                        
                        <!-- <button type="submit" class="btn btn-default">Book Now</button> -->
                    </form>
                </div>

            <?php } ?>



        </div>
    </div>


    <script src='View/JS/movieBooking.js'></script>
</body>


</html>