
<?php

class Driver
{
    function confirm_driver() {
        if ($_SESSION['user']['type'] == 'driver') {
            return true;
        }
        return false
    }
}