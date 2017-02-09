<div class="ResOverview">
<nav class="menu-nav">
    <div class="nav-wrapper">
        <?php
        $back = '<a href="index.php?reservation" class="back"><i class="material-icons">keyboard_backspace</i></a>';
        if (in_array('pickUp', title())) {
            $header =  'Pick Up';
        } else if (in_array('ride', title())) {
            $header =  'Ride Along';
        } else if (in_array('luxury', title())) {
            $header =  'Luxury Hire';
        } else if (in_array('personal', title())) {
            $header =  'Personal';
        } else if (in_array('reservation', title())) {
            $back = "";
            $header = 'Reservation';
            include'sidebar.php';
        }
        if ($back !="") {
            echo $back;
        }
?>
        <a href="#" class="brand-logo center"><?php echo $header;?></a>
        <a href="#" class="dropdown-button right" data-activates='dropOptions'><i class="material-icons">more_vert</i></a>
        <ul id="dropOptions" class="dropdown-content">
            <li class="divider"></li>
            <li><a href="index.php">home</a></li>
            <li><a href="?home">menu</a></li>
            <li><a href="#">about</a></li>
        </ul>
    </div>
</nav>
<?php
if (in_array('pickUp', title()) || in_array('ride', title()) || in_array('luxury', title()) || in_array('personal', title())) {
            include 'reservation-form.php';
} else if (in_array('reservation', title())) {
            include 'reservation-home.php';
}
?>
</div>
<script>
var html = document.querySelector('html');
html.style.background = '#4CAF50';
</script>