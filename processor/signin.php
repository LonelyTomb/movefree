<?php
require 'start_session.php';
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

if (isset($_POST['logIn'])) {
    try {
        $email = secure($_POST['email']);
        $password = secure($_POST['password']);
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            try {
                $stmt->bindColumn('name',$name);
                $stmt->bindColumn('email',$email);
                $stmt->bindColumn('password',$pwd);
                $stmt->bindColumn('type',$type);
                $stmt->bindColumn('id',$id);

                $result = $stmt->fetch(PDO::FETCH_BOUND);
                if (password_verify($password, $pwd)) {
                    $_SESSION['user']['logged'] = true;
                    $_SESSION['user']['username'] = $name;
                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['type'] = $type;
                    $_SESSION['user']['id'] = $id;
                    echo json_encode(array('txt'=>'Log In Process Successful!', 'color'=>$color['valid'],'type'=>$type));
                    exit;
                } else {
                    echo json_encode(array('txt'=>'The combination of the email and password entered is incorrect!', 'color'=>$color['invalid']));
                    exit;
                }
            } catch (PDOException $e) {
                $error = $e->getMessage();
            }
        } else {
            echo json_encode(array('txt'=>'The combination of the email and password entered is incorrect!', 'color'=>$color['invalid']));
            exit;
        }
    } catch (PDOException $e) {
        $error = $e->getMessage();
    }
}
