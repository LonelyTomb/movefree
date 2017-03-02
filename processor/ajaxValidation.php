<?php
require "validate.php";
if (isset($_POST['name'])) {
    echo json_encode(test_name($_POST['name'], $color));
    exit;
}

if (isset($_POST['email'])) {
    echo json_encode(test_email($_POST['email'], $color));
    exit;
}
if (isset($_POST['password'])) {
    echo json_encode(test_password($_POST['password'], $color));
    exit;
}
if (isset($_POST['phone'])) {
    echo json_encode(test_phone($_POST['phone'], $color));
    exit;
}
if (isset($_POST['address'])) {
    echo json_encode(test_address($_POST['address'], $color));
    exit;
}
if (isset($_POST['user'])) {
    if ($_POST['user'] == "") {
        echo json_encode(array('color'=>'invalid','txt' => 'Invalid selection'));
        exit;
    }
}
