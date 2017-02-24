<?php
$color = array(
'invalid' => 'invalid', 'valid' => 'valid', );
/**
 *Returns false if in index page
 *
 *@return false
 */
function title() {
    if (isset($_GET) && $_GET != null) {
        return array_keys($_GET);

    }
    return array();
}
function secure($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
function logout(){
        session_unset();
        session_destroy();
        header('location:index.php');
}

function confirm_logged() {
    if (isset($_SESSION['logged']) && isset($_SESSION['user']) && $_SESSION['user'] !=="") {
        return true;
    }
        return  false;
}

function correctTime($time,$timesuffix){
    $time = new DateTime($time);
    if ($timesuffix == 'PM') {
        $time->add(new DateInterval('PT12H'));
    }
         return $time->format('g:i A');
}
function displayTime($time){
    $time = json_decode($time);
    return $time;
}
function checkPostVariables($keys) {
    foreach ($keys as $key) {
        if (!isset($_POST["$key"])) { 
            return false;
        }
    }
    return true;
}
