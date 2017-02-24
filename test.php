<?php
$time = '10:00';
function correctTime($time,$timesuffix){
    $time = new DateTime($time);
    if ($timesuffix == 'AM') {
        return $time;
    } else if ($timesuffix == 'PM') {
        $time->add(new DateInterval('PT12H'));
        return $time;
    }
    return ;
}
var_dump( correctTime($time,'PM'));

var_dump(correctTime('3:30 PM','AM'));