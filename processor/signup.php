<?php
require 'validate.php';
if (isset($_POST['signUp'])) {
    $name = secure($_POST['name']);
    $email = secure($_POST['email']);
    $phone = secure($_POST['phone']);
    $address = secure($_POST['address']);
    $user = secure($_POST['user']);
    $password = secure($_POST['password']);

        try {
            if(!in_array('valid', test_name($name,$color))){
                     echo json_encode(array('txt'=>'Invalid Username!', 'color'=>$color['invalid']));

        exit;
            }
            if(!in_array('valid', test_email($email,$color))){
                     echo json_encode(array('txt'=>'Invalid Email!', 'color'=>$color['invalid']));

        exit;
            }
            if(!in_array('valid', test_phone($phone,$color))){
                     echo json_encode(array('txt'=>'Invalid Phonenumber!', 'color'=>$color['invalid']));

        exit;
            }
            if(!in_array('valid', test_address($address,$color))){
                     echo json_encode(array('txt'=>'Invalid Address!', 'color'=>$color['invalid']));

        exit;
            }
            if(!in_array('valid', test_password($password,$color))){
                     echo json_encode(array('txt'=>'Invalid Password!', 'color'=>$color['invalid']));

        exit;
            }
            if (isset($user)) {
                if ($user == "") {
                    echo json_encode(array('color'=>'invalid','txt' => 'Invalid selection'));
        exit;
    }
}
        #Encrypts Password
      $enc_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = 'INSERT INTO users (name, email, phone, address, password,type) VALUES(:name,:email,:address,:phone,:password,:type)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR, 11);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);
            $stmt->bindParam(':password', $enc_password, PDO::PARAM_STR);
            $stmt->bindParam(':type', $user, PDO::PARAM_STR);
            $stmt->execute();
            $errorInfo = $stmt->errorInfo();
            if (isset($errorInfo[2])) {
                // echo $errorInfo[2];
                echo json_encode(array('txt'=>"<strong>Unable to Complete Registeration Process! Please Try Again!</strong>", 'color'=>$color['invalid'],'e'=>$errorInfo[2]));
            } else {
                echo json_encode(array('txt'=>"<strong>Account Registeration Successful!</strong>", 'color'=>$color['valid']));
                exit;
            }
        } catch (PDOException $e) {
            $err = $e->getMessage();
        }
    }

