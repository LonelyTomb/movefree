<main class='driverOverview'>
    <?php
    require 'processor/connection.php';
    try{
        $sql = "SELECT * FROM reservation WHERE status = 'pending' LIMIT 10";
        $stmt= $pdo->query($sql);
        $stmt->bindColumn('id',$res_id);
        $stmt->bindColumn('user_id',$user_id);
        $stmt->bindColumn('current_location',$location);
        $stmt->bindColumn('destination',$destination);
        $stmt->bindColumn('time',$time);
        if ($stmt->rowCount()>0) {
            while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
                $sql = "SELECT * FROM users WHERE id = '$user_id'";
                $user= $pdo->query($sql);
                $user->bindColumn('profile_pic',$pic);
                $user->bindColumn('name',$name);
                $user->fetch(PDO::FETCH_BOUND);

            echo "<div class='row request'>
        <div class='col m10 l6'>
            <a href='?driver&pass&res_id=$res_id&user_id=$user_id'>
                <div class='card-panel hoverable'>
                    <div class='row'>
                        <div class='col s2'>
                            <img src='$pic' alt='' class='img-responsive circle'>
                        </div>
                        <div class='col s5 center'>
                            <p class='flow-text'>$name</p>
                            <p class='flow-text'>$location</p>
                        </div>
                        <div class='col s5 center'>
                            <p class='flow-text'>$time</p>
                            <p class='flow-text'>$destination</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>";

            }
        }
    } catch (PDOException $e){
        $error = $e->getMessage();
    }

    ?>
</main>