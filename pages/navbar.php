<nav class="menu-nav">
    <div class="nav-wrapper">
        <?php
        $back_link = $_SERVER['HTTP_REFERER'];
        $back = "<a href='$back_link' class='back'><i class='material-icons'>keyboard_backspace</i></a>";
        if (in_array('preview', title()) || in_array('home', title())) {
            $back = "";
            $header = '<img class="img-responsive" src="images/logo1">';
            if (in_array('home', title())) {
                include'sidebar.php';
            }
        } else if (in_array('pickUp', title())) {
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
        <?php
        if (!in_array('preview', title())) {
            include  'options.php';
        }

?>
 </div>
</nav>