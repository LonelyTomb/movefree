<div class="ResOverview">
<?php
if (in_array('pickUp', title()) || in_array('ride', title()) || in_array('luxury', title()) || in_array('personal', title())) {
            include 'reservation-form.php';
            include 'reserved.php';
} else if (in_array('select', title())) {
            include 'selectDriver.php';
} else if (in_array('reservation', title())) {
            include 'reservation-home.php';
}
?>
</div>