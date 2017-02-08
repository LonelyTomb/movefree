<nav class="menu-nav">
    <div class="nav-wrapper">
        <?php
        $back = '<a href="index.php?reservation"><i class="material-icons">keyboard_backspace</i></a>';
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
    </div>
</nav>
<?php
if (in_array('pickUp', title()) || in_array('ride', title()) || in_array('luxury', title()) || in_array('personal', title())) {
            include 'reservation-form.php';
} else if (in_array('reservation', title())) {
            include 'reservation-default.php';
}
