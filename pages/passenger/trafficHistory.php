<main class="historyOverview">
<?php
require 'processor/connection.php';
try{
    $sql = "SELECT * FROM reservation WHERE status = 'pending' LIMIT 10";
    $stmt= $pdo->query($sql);
    $stmt->bindColumn('destination',$destination);
    $stmt->bindColumn('reservation_type',$reservation_type);
    $stmt->bindColumn('time',$time);
    $stmt->bindColumn('time_suffix',$time_suffix);
    $stmt->bindColumn('status',$status);
    if($stmt->rowCount() > 0){
        while($row = $stmt->fetch(PDO::FETCH_BOUND)){
            echo "<div class='row '>
                    <div class='card-panel col s10 m6'>
                <div class='row'>
                <p class='hist_type col s7'>Reservation type: <span class='res_type'>$reservation_type</span></p><p class='hist_time col s5'>Time: <span class='res_time'>$time</span><span class='res_time_suffix'>$time_suffix</span></p>
                </div>
                <div class='row'>
                <p class='hist_dest col s8'>
                    Destination: <span class='res_dest'>$destination</span>
                </p>
                <p class='status col s4'>Status: <span class='status_type'>$status</span></p>
                </div>
                <div class='row center complete'>
                <a href='#' class='btn waves-effect waves-ripple truncated'>Complete Transaction</a>
                </div>
            </div>
        </div>";
        }
    }
}catch(PDOException $e){
    echo ($e->getMessage());
}
?>
</main>