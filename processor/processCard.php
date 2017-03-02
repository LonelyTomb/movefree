<?php
require 'start_session.php';
require 'processor.php';
require 'connection.php';
if (isset($_POST['pay']) && checkPostVariables(array('type','number','cv')) == true) {
    $type = $_POST['type'];
    $number = $_POST['number'];
    $cv = $_POST['cv'];
    $driver_id = $_POST['driver_id'];
    $res_id = $_POST['res_id'];

    try{
        $sql = 'INSERT INTO card(type,number,cv,user_id) VALUES(:type,:number,:cv,:user_id)';
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':cv', $cv);
        $stmt->bindParam(':user_id', $_SESSION['user']['id']);
        $stmt->execute();
        if ($stmt->rowCount()>0) {
            $sql = "UPDATE reserved SET paymentStatus='paid',paymentTime=NOW() WHERE driver_id =:driver_id AND res_id = :res_id AND passenger_id =:passenger_id";
            $stmt=$pdo->prepare($sql);
            $stmt->execute(array(':driver_id'=>$driver_id,':res_id'=>$res_id,':passenger_id'=>$_SESSION['user']['id']));
            if ($stmt->rowCount()>0) {
                    echo json_encode(array('txt'=>'success','desc'=>'Payment Successful','res_id'=>$res_id,'driver_id'=>$driver_id));
            }
        } else {
            echo json_encode(array('txt'=>'error','desc'=>'Unable to complete payment'));

        }
    } catch (PDOException $e) {
        $error = $e->getMessage();
    }

} else {
            echo json_encode(array('txt'=>'error','desc'=>'Payment Successful'));
}