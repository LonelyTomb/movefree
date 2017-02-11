<main class="ResOverview">
<?php
if (in_array('reservation', title())) {
    if (in_array('pickup', title()) || in_array('ride', title()) || in_array('luxury', title()) || in_array('personal', title())) {
        if (in_array('select', title())) {
            if (in_array('pay', title())) {
                if (in_array('success', title())) {
                    include 'payment-successful.php';
                    return;
                }
                include 'payment.php';
                return ;
            }
                include 'selectDriver.php';
                return ;
        }
        include 'reservation-form.php';
        include 'reserved.php';
                return ;
    }
    include 'reservation-home.php';
                return ;

}
?>
<?php echo '</main>';?>
