<!DOCTYPE html>
<html lang="en">

<head>
    <title>MoveFree</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
    <link href="fonts/iconfont/material-icons.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700" rel="stylesheet">
</head>


<body>
    <?php
    require 'processor/processor.php';

    //Loads Landing Page
    if (title() == false) {
            include 'pages/default.php';
    }

    if (title() != false) {
        include 'pages/header.php';
        if (in_array('preview', title())) {
                include 'pages/sign-preload.php';
        } else if (in_array('signIn', title())) {
            include 'pages/signIn.php';
        } else if (in_array('signUp', title())) {
                include 'pages/signUp.php';
        } else if (in_array('home', title())) {
                include 'pages/home.php';
        } else if (in_array('reservation', title())) {
                include  'pages/reservation.php';
        }
        include 'pages/footer.php';
    }
   ?>
        <script src=" js/jquery.min.js "></script>
        <script src=" js/jquery.star.rating.min.js "></script>
        <script src="js/materialize.min.js "></script>
        <script src="js/script.js "></script>
</body>

</html>