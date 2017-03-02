<main class="historyOverview">
<?php
require 'processor/connection.php';

/**
 *Passenger History
 */

if ($_SESSION['user']['type'] == 'Passenger') {
    try{
        $user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM reservation WHERE user_id = '$user_id' LIMIT 10";

        $stmt= $pdo->query($sql);
        $stmt->bindColumn('id',$res_id);
        $stmt->bindColumn('destination',$destination);
        $stmt->bindColumn('reservation_type',$reservation_type);
        $stmt->bindColumn('time',$time);
        $stmt->bindColumn('status',$status);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
                $sql = "SELECT * FROM reservationtypes WHERE name='$reservation_type'";
                $alias=$pdo->query($sql);
                $alias->bindColumn('alias', $res_alias);
                $alias->fetch(PDO::FETCH_BOUND);
                if ($status == 'driver matched') {
                    $sql = "SELECT * FROM reserved WHERE res_id='$res_id'";
                    $reserved = $pdo->query($sql);
                    $reserved->bindColumn('driver_id', $driver_id);
                    $reserved->bindColumn('paymentStatus', $paymentStatus);
                    $reserved->fetch(PDO::FETCH_BOUND);
                }


                echo "<div class='row '>
                        <div class='card-panel col s10 m6'>
                    <div class='row'>
                    <p class='hist_type col s7'>Reservation type: <span class='res_type'>$reservation_type</span></p><p class='hist_time col s5'>Time: <span class='res_time'>$time</span></p>
                    </div>
                    <div class='row'>
                    <p class='hist_dest col s8'>
                        Destination: <span class='res_dest'>$destination</span>
                    </p>
                    <p class='status col s4'>Status: <span class='status_type'>$status</span></p>
                    </div>";
                if ($status == "driver matched" && $paymentStatus == 'pending') {
                    $complete =" <div class='row center complete'>
                    <a href='index.php?reservation&$res_alias&select&driver=$driver_id&res_id=$res_id' class='btn waves-effect waves-ripple truncated'>View</a>";
                     echo $complete;
                } else if ($status == "driver matched" && $paymentStatus == 'paid') {
                    $complete ="<div class='row center complete'><a href='#' class='btn waves-effect disabled'>Completed</a>";
                    echo $complete;
                }
                    echo " </div>
                </div>
            </div>";
            }
        } else {
            echo '<div class="row">
                <p class="flow-text center">You currently don\'t have any reservation</p>
            </div>';
        }
    }catch(PDOException $e){
        echo ($e->getMessage());
    }
        /**
        *Driver History
        */
} else if ($_SESSION['user']['type'] == 'Driver') {
    $driver_id = $_SESSION['user']['id'];
    try{
        $sql  = "SELECT * FROM reserved WHERE driver_id = '$driver_id'";
        $stmt=$pdo->query($sql);
        $stmt->bindColumn('passenger_id',$passenger_id);
        $stmt->bindColumn('driver_id',$driver_id);
        $stmt->bindColumn('res_id',$res_id);
        $stmt->bindColumn('paymentStatus',$paymentStatus);
        while($row = $stmt->fetch(PDO::FETCH_BOUND)){
            $sql = "SELECT * FROM users WHERE id = '$passenger_id'";
            $usr = $pdo->query($sql);
            $usr->bindColumn('name',$name);
            $user = $usr->fetch(PDO::FETCH_BOUND);
            $sql = "SELECT * FROM reservation WHERE id = '$res_id' AND user_id = '$passenger_id'";
            $req = $pdo->query($sql);
            $req->bindColumn('destination', $destination);
            $req->bindColumn('time', $time);
            $req->bindColumn('price', $price);
            $req->bindColumn('reservation_type', $reservation_type);
            $req->bindColumn('timestamp', $timestamp);
            while($us = $req->fetch(PDO::FETCH_BOUND)){
                echo "<div class='row '>
                        <div class='card-panel col s10 m6'>
                        <p class='center name'>Client Name: $name</p>
                    <div class='row'>
                    <p class='hist_type col s7'>Reservation type: <span class='res_type'>$reservation_type</span></p><p class='hist_time col s5'>Time: <span class='res_time'>$time</span></p>
                    </div>
                    <div class='row'>
                    <p class='hist_dest col s8'>
                        Destination: <span class='res_dest'>$destination</span>
                    </p>
                    <p class='status col s4 center'>Payment Status: <span class='status_type'>$paymentStatus</span></p>
                    </div>
                    <p class='timestamp'>Completed at $timestamp</p>
                </div>
            </div>";
            }
        }
    } catch (PDOException $e) {
        $error = $e->getMessage();
    }
}
?>
</main>