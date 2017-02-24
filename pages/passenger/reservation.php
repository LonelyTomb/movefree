<main class="ResOverview">
<?php

if (in_array('success', title())) {
            include 'payment-successful.php';
} else if (in_array('pay', title())) {
            include 'payment.php';
} else if (in_array('select', title())) {
            include 'selectDriver.php';
} else if (in_array('pickup', title()) || in_array('ride', title()) || in_array('luxury', title()) || in_array('personal', title())) {
        $title = title();
        $_SESSION['reservationtype'] =array_pop($title);
            include 'reservation-form.php';
            include 'reserved.php';
} else if (in_array('reservation', title())) {
            include 'reservation-home.php';
}
?>
</main>
