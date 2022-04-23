<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>

    body {
      background: black
      
    }
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      max-height: fit-content;
    }

    .container-fluid {
      margin: 10px;
      margin-bottom: 30px;
    }


    .container-fluid .text-center {
      margin-bottom: 10px;
    }


    .row img {

      width: 160px;
      height: 220px;
    }

    .row .col-lg-2 {
      margin-bottom: 30px;
      margin-right: -20px;

    }
  


    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    .carousel-inner img {
      width: 99%;
      /* Set width to 100% */
      margin: auto;
      min-height: 200px;
      max-height: 450px;
    }

    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 600px) {
      .carousel-caption {
        display: none;
      }
    }
  </style>
</head>

<body>


  <!-- Navbar-->
  <nav class='navbar navbar-inverse navbar-fixed-top'>

    <div class="container-fluid">
      <div class="navbar-header">
        <a href="#" class="navbar-brand">
          Cinema+
        </a>
      </div>
      <ul class="nav navbar-nav">
        <li class='active'><a href="index.php?function=invoke">Home</a></li>
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




  <!-- Crousel -->

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <!-- <li data-target="#myCarousel" data-slide-to="2"></li> -->
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <a href='#'><img src="View/Images/Movies/Pushpa.jpg" alt="Image"></a>
        <!-- <div class="carousel-caption">
            <h3>Sell $</h3>
            <p>Money Money.</p>
          </div> -->
      </div>

      <div class="item">
        <a href='#'><img src="View/Images/Movies/KGF 2.jpg" alt="Image"></a>
        <!-- <div class="carousel-caption">
            <h3>More Sell $</h3>
            <p>Lorem ipsum...</p>
          </div> -->
      </div>

      <!-- <div class="item">
          <img src="View/images/Movie-1200-630.jpg" alt="Image">
          <div class="carousel-caption">
            <h3>More Sell $</h3>
            <p>Lorem ipsum...</p>
          </div>
        </div> -->
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>



  <div class="container">

  <hr>

  <h1 class='text-center'>New Movies</h1>

    <?php

    echo "<div class='row no-gutters'>";

    $i = 1;

    foreach($movies as $movie) {
    
    echo '<div class="col-lg-2">';
    echo '<a href="index.php?function=movieProfile&movieId='.$movie->getMovieId().'"><img class="img-responsive img-rounded " src="'.$movie->getPathInfo().'"></a>';
    echo '</div>';
    // $i++;

    if($i == 6) {
      // <!-- Force next columns to break to new line -->
      echo "yes";
      echo '<div class="w-100"></div>';
      $i = 1;
    
    }
    }

    echo "</div>";

    ?>


  </div>



  <footer class="container-fluid text-center" style="background: black">
  <a href="#"><span class="glyphicon glyphicon-envelope"></span></a>
  </footer>


  <script src='View/JS/search.js'></script>
</body>

</html>