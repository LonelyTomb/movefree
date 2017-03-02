<?php require 'processor/start_session.php';//require('../vendor/autoload.php');
require 'processor/processor.php';?>
<?php
$pageTitle = 'Movefree';
if (in_array('logout', title())) {
        logout();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="images/favicon.ico" >
    <title><?php echo $pageTitle;?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require 'processor/head-resources.php';?>
</head>


<body>
    <?php


    //Loads Landing Page
    if (empty(title())) {
            include 'pages/default.php';
    }

    if (!empty(title())) {
        include 'pages/header.php';
        if (in_array('preview', title())) {
                include 'pages/sign-preload.php';
        } else if (in_array('history', title())) {
                    include 'pages/trafficHistory.php';
        } else if (isset($_SESSION['user']['logged']) && $_SESSION['user']['type'] == 'Passenger') {
                //Passenger pages
            if (in_array('home', title())) {
                    include 'pages/home.php';
            } else if (in_array('reservation', title())) {
                    include  'pages/passenger/reservation.php';
            } else {
                    header('location:index.php');
            }
        } else if (isset($_SESSION['user']['logged'])  && $_SESSION['user']['type'] == 'Driver') {
                //Driver pages
            if (in_array('pass', title())) {
                    include 'pages/driver/passenger.php';
            } else if (in_array('driver', title())) {
                    include 'pages/driver/driver.php';
            } else {
                    header('location:index.php');
            }
        } else {
                header('location: index.php');
        }
        include 'pages/footer.php';
    }
   ?>
        <script src=" js/jquery.min.js "></script>
        <script src=" js/jquery.star.rating.min.js "></script>
        <script src="js/materialize.min.js "></script>
        <script src="js/script-dist.js "></script>
</body>

</html>