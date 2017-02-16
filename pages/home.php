<?php 
if(!isset($_SESSION['user']['logged']) && $_SESSION['user']['type']!='Passenger'){
    header('location:index.php');
}

?>
<main class="home-overview">
    <div class="row">
        <div class="col s12 m6 menu menu1">
            <a href="?reservation" class="btn waves-effect waves ripple waves-white">Make Reservation</a>
        </div>
        <div class="col s12 m6 menu menu2">
            <a href="#" class="btn waves-effect waves ripple waves-white">Traffic Checker</a>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6 menu menu3">
            <a href="?history" class="btn waves-effect waves ripple waves-white">Travel History</a>
        </div>
        <div class="col s12 m6 menu menu4">
            <a href="#" class="btn waves-effect waves ripple waves-white">Settings</a>
        </div>
    </div>
</main>