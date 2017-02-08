<?php
/**
*
*
*/
function title(){
    if (isset($_GET) && $_GET != null) {
        return array_keys($_GET);

    }
    return false;
}