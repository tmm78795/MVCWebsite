<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Add Movie</title>
</head>

<body>



    <div class="container">


        <?php

        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger">';
            echo $_GET['error'];
            echo '</div>';
        }
        ?>


        <h1 class='text-center'>Sign Up</h1>
        <form action="index.php?function=addUser" class="form-horizontal"  method='POST'>

            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pwd" placeholder="Enter Username" name='username'>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10">
                    <input type="Password" class="form-control" id="pwd" placeholder="Enter Length" name='password'>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Full Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pwd" placeholder="Enter text" name='name'>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pwd" placeholder="Enter text" name='email'>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Mobile Number:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pwd" placeholder="Enter text" name='mobileNumber'>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-success">
                </div>
            </div>


        </form>

    </div>
</body>

</html>