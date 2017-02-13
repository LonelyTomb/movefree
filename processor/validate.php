<?php
require 'connection.php';
function secure($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
$color = array(
'invalid' => 'invalid', 'valid' => 'valid', );

function validateName($nam)
{
    if (preg_match('/^[a-z\d- ]{2,20}$/i', $nam)) {
        return true;
    } else {
        return false;
    }
}


function test_name($name, $color)
{
    $name = secure($name);
    if (empty($name)) {
        return array('color' => $color['invalid'], 'txt' => 'Username is required!');
    }
    if (strlen($name) < 5) {
        return array('color' => $color['invalid'], 'txt' => 'Username length must be greater than 5!');
    } elseif (!validateName($name)) {
        return array('color' => $color['invalid'], 'txt' => 'Invalid Character! ');
    } else {
        return array('color' => $color['valid'], 'txt' => 'Username Valid!');
    }
}
function test_email($email, $color)
{
    global  $pdo;
    $email = secure($email);
    if (empty($email)) {
        return array('color' => $color['invalid'], 'txt' => 'Email is required!');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return array('color' => $color['invalid'], 'txt' => 'Invalid Email Address!');
    } else {
        try {
            $sql = 'SELECT email FROM users WHERE email=:email';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $errorInfo = $stmt->errorInfo();
            if (isset($errorInfo[2])) {
                $error = $errorInfo[2];
        // return json_encode(array('color'=>$color['invalid'],'txt'=>"Error"));
            }
            if ($stmt->rowCount() > 0) {
                return array('color' => $color['invalid'], 'txt' => 'Email Address already registered!');
            } else {
                return array('color' => $color['valid'], 'txt' => 'Email Address Valid!');
            }
        } catch (PDOException $e) {
            $error = $e->getMessage();

            return array('color' => $color['invalid'], 'txt' => $error);
        }
    }
}
function test_password($password, $color)
{
    $password = secure($password);
    if (empty($password)) {
        return array('color' => $color['invalid'], 'txt' => 'Password field cannot be empty!');
    }
    if (strlen($password) < 4) {
        return array('color' => $color['invalid'], 'txt' => 'Password length must be greater than 4!');
    } else {
        return array('color' => $color['valid'], 'txt' => 'Password OK!');
    }
}

function test_phone($phone, $color)
{
    if (empty($phone)) {
        return array('color' => $color['invalid'], 'txt' => 'Telephone field cannot be empty!');
    }
    if (preg_match('/(^0)([7|8|9])(\d{9})/', $phone)) {
        return array('color' => $color['valid'], 'txt' => 'Telephone number valid!');
    } else {
        return array('color' => $color['invalid'], 'txt' => 'Invalid Telephone number!');
    }
}
function test_address($address, $color)
{
    $name = secure($address);
    if (empty($address)) {
        return array('color' => $color['invalid'], 'txt' => 'Address is required!');
    }
    if (strlen($address) < 5) {
        return array('color' => $color['invalid'], 'txt' => 'Address length must be greater than 5!');
    } elseif (!validateName($address)) {
        return array('color' => $color['invalid'], 'txt' => 'Invalid Character! ');
    } else {
        return array('color' => $color['valid'], 'txt' => 'Address Valid!');
    }
}
