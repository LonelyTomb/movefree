
<?php
require 'connection.php';
if (isset($_POST['complete'])) {
    try{
        $passenger = $_POST['passenger'];
        $driver = $_POST['driver'];
        $res_id = $_POST['res_id'];
        $sql = "SELECT * FROM reserved WHERE passenger_id = '$passenger' AND driver_id = '$driver' AND res_id = '$res_id'";
        $stmt = $pdo->query($sql);
        if ($stmt->rowCount() == 0) {
            $sql = 'INSERT INTO reserved (passenger_id,driver_id,res_id,timestamp) VALUES(:passenger_id,:driver_id,:res_id,NOW())';
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(':passenger_id',$passenger,PDO::PARAM_STR);
            $stmt->bindParam(':driver_id',$driver,PDO::PARAM_STR);
            $stmt->bindParam(':res_id',$res_id,PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $up = "UPDATE reservation SET status='driver matched' WHERE id=:id AND user_id=:user_id";
                $stmt = $pdo->prepare($up);
                $stmt->bindParam(':user_id',$passenger);
                $stmt->bindParam(':id',$res_id);
                $stmt->execute();
                if ($stmt->rowCount()>0) {

                    echo json_encode(array('txt'=>'success'));
                } else {
                    echo json_encode(array('txt'=>'error','desc'=>'unable to complete transaction'));
                }
            }
        } else {
            echo json_encode(array('txt'=>'error','desc'=>'You have already accepted the request'));
        }
    }catch(PDOException $e){
        $error = $e->getMessage();
    }
}