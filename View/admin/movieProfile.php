<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Cinema+ Admin Portal</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index1.php?function=homePage">Home</a></li>
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


    <div class="container">

    <form action="index1.php?function=updateMovie" class="form-horizontal" enctype="multipart/form-data" method='POST'>

        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Title:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pwd"  name='title' value='<?php echo $movie->getTitle()?>'>
                <input type="hidden" class="form-control" id="img" name='movieId' value=<?php echo $movie->getMovieId()?>>
                <input type="hidden" class="form-control" id="img" name='pathInfo' value=<?php echo $movie->getPathInfo()?>>
                <?php echo $movie->getPathInfo()?>
                
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Length:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pwd"  name='length' value='<?php echo $movie->getLength() ?>'>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Release Date:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="pwd"  name='releaseDate' value=<?php echo $movie->getReleaseDate()?>>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Price:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pwd"  name='price' value=<?php echo $movie->getPrice()?>>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Description:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pwd"  name='description' value=<?php echo $movie->getDescription()?>>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="img">Image:</label>
            <div class="col-sm-10">
                <img style='width:120px; height:120px' src='<?php echo $movie->getPathInfo()?>' alt='image'>
                <input type="file" class="form-control" id="img" name='imageToUpload'>
                
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success" value="Update Movie">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href='index1.php?function=homePage'><input type="button" class="btn btn-warning" value="Cancel"></a>
            </div>
        </div>


    </form>

    </div>


</body>

</html>