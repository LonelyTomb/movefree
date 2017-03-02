
<?php

class Passenger
{
    function confirm_passenger() {
        if ($_SESSION['user']['type'] == 'passenger') {
            return true;
        }        return false;

    }
}