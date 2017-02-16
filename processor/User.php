
<?php
class User
    {
        function getUser(){
                return $_SESSION['user']['type'];
            }
}