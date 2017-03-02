<nav class="menu-nav">
    <div class="nav-wrapper">
        <?php
            $header ='<img class="logo prefix" src="images/logo.png">';
            $back_link = isset($_SERVER['HTTP_REFERER']) ?$_SERVER['HTTP_REFERER']:"";
            $res = array('pickup'=>'Pick Up','ride'=>'Ride Along','luxury'=>'Luxury Hire','personal'=>'Personal');
        if ($back_link != "") {
            $back = "<a href='$back_link' class='back'><i class='material-icons'>keyboard_backspace</i></a>";
        } else {
            $back = "";
        }

        if (in_array('preview', title()) || in_array('home', title())) {
            $back = "";
            if (in_array('home', title())) {
                include'sidebar.php';
            }
        }

        //Passenger Pages

        if (in_array('pay', title())) {
            $header =  'Payment Details';
        } else if (in_array('select', title())) {
            $header =  'Driver Details';
        } else if (in_array('history', title())) {
            $back = "";
            $header = 'Traffic History';
            include'sidebar.php';
        } else if (in_array('pickup', title())) {
            $header =  $res['pickup'];
        } else if (in_array('ride', title())) {
            $header =  $res['ride'];
        } else if (in_array('luxury', title())) {
            $header =  $res['luxury'];
        } else if (in_array('personal', title())) {
            $header =  $res['personal'];
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
            include 'sidebar.php';
        }

        if ($back != "") {
            echo $back;
        }
?>
        <a href="index.php" class="brand-logo center"><?php echo $header;?></a>
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