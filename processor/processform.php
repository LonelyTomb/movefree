
<?php
require 'start_session.php';
require 'processor.php';
require 'connection.php';

if (isset($_POST['reserve'])) {
    $place = secure($_POST['place']);
    $destination = secure($_POST['destination']);
    $price = secure($_POST['price']);
    $payment_type = secure($_POST['payment']);
    $time = secure($_POST['time']);
    $time_suffix = secure($_POST['time_suffix']);



    if ($place == "" ) {
        echo(json_encode('Location field cannot be empty', $color['invalid']));
        exit;
    }
    if ($destination == "" ) {
        echo(json_encode('Destination field cannot be empty', $color['invalid']));
        exit;
    }
    if ($price == "" ) {
        echo(json_encode('Price field cannot be empty', $color['invalid']));
        exit;
    }
    if ($payment_type == "" ) {
        echo(json_encode('Payment field cannot be empty', $color['invalid']));
        exit;
    }
    if ($time == "") {
        echo(json_encode('Time field cannot be empty', $color['invalid']));
        exit;
    }
    if ($time_suffix == "") {
        echo(json_encode('Time field cannot be empty', $color['invalid']));
        exit;
    }
    try{
        $sql  = 'SELECT * FROM reservationtypes WHERE alias = :alias';
        $stmt= $pdo->prepare($sql);
        $stmt->bindParam(':alias', $_SESSION['reservationtype']);
        $stmt->execute();
        $stmt->bindColumn('name', $type);
        $result = $stmt->fetch(PDO::FETCH_BOUND);

        $sql = 'SELECT * FROM reservation WHERE user_id=:user_id AND current_location=:current_location AND destination=:destination AND time=:time AND time_suffix=:suffix';
        $stmt=$pdo->prepare($sql);
          $stmt->bindParam(':user_id', $_SESSION['user']['id'],  PDO::PARAM_INT);
        $stmt->bindParam(':current_location', $place, PDO::PARAM_STR);
        $stmt->bindParam(':destination', $destination,  PDO::PARAM_STR);
        $stmt->bindParam(':time', $time, PDO::PARAM_STR);
        $stmt->bindParam(':time_suffix', $time_suffix, PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->fetchColumn() == 0){
        $sql = 'INSERT INTO reservation (user_id,current_location,destination,price,payment_type,time,time_suffix,reservation_type,timestamp) VALUES(:user_id,:current_location,:destination,:price,:payment_type,:time,:time_suffix,:reservation_type,NOW())';

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $_SESSION['user']['id'],  PDO::PARAM_INT);
        $stmt->bindParam(':current_location', $place, PDO::PARAM_STR);
        $stmt->bindParam(':destination', $destination,  PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':payment_type', $payment_type, PDO::PARAM_STR);
        $stmt->bindParam(':time', $time, PDO::PARAM_STR);
        $stmt->bindParam(':time_suffix', $time_suffix, PDO::PARAM_STR);
        $stmt->bindParam(':reservation_type', $type, PDO::PARAM_STR);
        $stmt->execute();

        $errorInfo = $stmt->errorInfo();
        if (!isset($errorInfo[2])) {
            echo json_encode(array('txt'=>'success','type'=>$type));
        } else {
            // echo json_encode(array('txt'=>$errorInfo[2]));
        }
        }else{
            echo json_encode(array('txt'=>'error','desc'=>'Reservation already made'));
        }
    }catch(PDOException $e){
        $error = $e->getMessage();
    }
}
