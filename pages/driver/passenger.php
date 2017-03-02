<?php
require 'processor/connection.php';
    $res_id = $_GET['res_id'];
    $user_id = $_GET['user_id'];
    $sql = "SELECT * FROM reservation WHERE id='$res_id'";
    $usql ="SELECT * FROM users WHERE id='$user_id'";
        $user=$pdo->query($usql);
        $user->bindColumn('name', $name);
        $user->bindColumn('profile_pic', $pic);
        $user_row = $user->fetch(PDO::FETCH_BOUND);
        $stmt=$pdo->query($sql);
        $stmt->bindColumn('current_location', $location);
        $stmt->bindColumn('destination', $destination);
        $stmt->bindColumn('time', $time);
        $stmt->bindColumn('reservation_type', $type);
        $stmt->bindColumn('price', $price);
        $row = $stmt->fetch(PDO::FETCH_BOUND);

?>
    <main class='passOverview'>
        <div class='row image'>
            <div class='center z-depth-1'>
                <img src='<?php echo $pic;?>' alt='' class='circle img-responsive'>
                <p class='name'>
                    <?php echo $name;?><input type="hidden" class='passenger_id' value='<?php echo $user_id;?>'><input type="hidden" class="driver_id" value="<?php echo $_SESSION['user']['id'];?>">
                    <input type="hidden" class="res_id" value="<?php echo $res_id;?>"></p>
            </div>
        </div>
        <div class='row center details'>
            <p class='currloc'>Current Location: <span class='cloc'><?php echo $location;?></span></p>
            <p class='dest'>Destination: <span class='pdest'><?php echo $destination;?></span></p>
            <p class="price"> Price: &#8358;<span><?php echo $price;?></span></p>
            <div class='col m10 l6 traffic'>
                <a href='#' class=''>
                    <div class='card-panel'>
                        <p>View Traffic Details</p>
                        <p>Est. Time: <span class='est'>15min</span></p>
                    </div>
                </a>
            </div>
        </div>
        <div class='row center pTime'>
            <p><span class='type'><?php echo $type;?></span> reservation time</p>
            <div class='col m10 l6 time'>
                <a href='#' class=''>
                    <div class='card-panel'>
                        <p>
                            <span class='initial'><?php echo $time;?></span>-
                            <span class='final'>
                    <?php
                    $final = new DateTime($time);
                    $final->add(new DateInterval('PT30M'));
                    echo $final->format('g:i A');
                    ?></span>
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row decision">
            <div class="but-group center">
                <a class="btn waves-effect waves-light accept">Accept</a><a class="btn waves-effect waves-light decline">Decline</a>
            </div>
            <div class="status progress hide">
                <div class="indeterminate"></div>
            </div>
        </div>
    </main>
    <div class="passengerSel overview row modal card" id="passengerSel">
        <div class="modal-content card-content">
            <p>You just accepted a <span class="res_type"></span> reservation from <span class="res_name"></span> by <span class="res_time"></span></span> at <span class="res_destination"></span> for &#8358;<span class="res_price"></span></p>
        </div>
        <div class="card-action">
            <p>Redirecting to traffic history</p>
            <div class="progress res_progress">
                <div class="indeterminate"></div>
            </div>
        </div>
    </div>
    </div>