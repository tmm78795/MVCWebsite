<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" href="View/CSS/booking3.css" class="CSS">
</head>
<body>
    <div class="main">
    <?php

echo '<div class="heading">';
echo "Booking Details";
echo '</div>';

echo '<div class="bill">';
            if($confirmed) {
                echo "<p>Booking successfull for $movieTitle on $date at $time. <br>Your total is: $$total</p>";
               
            }


            else {
                echo "Unable to book. Reason Maybe you already has booking for $movieTitle on $date at $time.";


            
            }
            
echo '</div>';

    ?>

<div class="link">
<a href='index.php?function=homePage'>Home</a> | <a href='index.php?function=logOut'>Logout</a>

</div>
</div>
</body>
</html>