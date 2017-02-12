<nav class="menu-nav">
    <div class="nav-wrapper">
        <?php
        $back_link = $_SERVER['HTTP_REFERER'];
        $back = "<a href='$back_link' class='back'><i class='material-icons'>keyboard_backspace</i></a>";

        if (in_array('preview', title()) || in_array('home', title())) {
            $back = "";
            $header = '<img class="logo prefix" src="images/logo.png">';
            if (in_array('home', title())) {
                include'sidebar.php';
            }
        }

        //Passenger Pages
        if (in_array('pickUp', title())) {
            $header =  'Pick Up';
        } else if (in_array('ride', title())) {
            $header =  'Ride Along';
        } else if (in_array('luxury', title())) {
            $header =  'Luxury Hire';
        } else if (in_array('personal', title())) {
            $header =  'Personal';
        } else if (in_array('pay', title())) {
            $header =  'Payment Details';
        } else if (in_array('select', title())) {
            $header =  'Driver Details';
        } else if (in_array('reservation', title())) {
            $back = "";
            $header = 'Reservation';
            include'sidebar.php';
        }

        //Driver Pages
        if (in_array('pass', title())) {
            $header= 'Passenger Details';
        } else if (in_array('driver', title())) {
            $back ="";
            $header = 'Pickup Request';
            include 'sidebar.php';
        }

        if ($back !="") {
            echo $back;
        }
?>
        <a href="#" class="brand-logo center"><?php echo $header;?></a>
        <?php
        if (in_array('home', title())) {
            echo '<ul class="right">
            <li><a href="#"><i class="material-icons">email</i></a></li>
            <li><a href="#"><i class="material-icons">person</i></a></li>
            <li><a href="#"><i class="material-icons">notifications</i></a></li>
            </ul>';
        }

        if (!in_array('preview', title()) && !in_array('home', title())) {
            include  'options.php';
        }

?>
 </div>
</nav>