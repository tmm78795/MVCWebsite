<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class='text-center'>Admin Login</h2>
</div>

<div class="container">
<form action="index1.php?function=checkLogin" method="POST">
  <div class="form-group">
    <label for="email">Username:</label>
    <input type="text" class="form-control" id="username" name='adminName'>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name='password'>
  </div>
  
  <div class="form-group">
            
      <input type="submit" class="btn btn-success">
  </div>
  <div class="form-group">
      
    <a href='index.php'><input type="button" value="Go back to website"></a>

  </div>
</form>

</div>
</body>
</html>