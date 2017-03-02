
<?php
require 'processor/connection.php';
$res_id = $_GET['res_id'];
$driver_id = $_GET['driver_id'];
$passenger_id = $_SESSION['user']['id'];

try{
    $sql = 'SELECT * FROM reservation WHERE id=:res_id AND user_id=:passenger_id';
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(':res_id'=>$res_id,':passenger_id'=>$passenger_id));
    $stmt->bindColumn('payment_type', $payment_type);
    $stmt->fetch(PDO::FETCH_BOUND);
} catch(PDOException $e) {
        $error = $e->getMessage();
}
if ($payment_type == 'Card') {
    echo "<div class='payment-overview row'>
    <div class='col m10 l6'>
        <div class='card'>
            <div class='card-content'>
                <form action=''>
                    <div class='row'>
                    <input type='hidden' value='$res_id' class='res_id'>
                    <input type='hidden' value='$driver_id' class='driver_id'>
                        <div class='input-field row'>
                            <select class='cardType'>
                                <option value='' selected disabled>CardType</option>
                                <option value='mastercard'>MasterCard</option>
                                <option value='verve'>Verve</option>
                                <option value='visa'>Visa</option>
                            </select>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field row'>
                            <input type='text' placeholder='Card Number' class='validate cardNumber'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='input-field row'>
                            <input type='text' placeholder='Cv' class='validate cV'>
                        </div>
                    </div>
                    <div class='row center'>
                        <a href='#' class='btn waves-effect waves-ripple green payment'>Make Payment</a>
                    </div>
                    <div class='row'>
                    <div class='progress status hide'>
                    <div class='indeterminate'></div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>";
} else if ($payment_type == 'Pay on Delivery') {
    try {
        $sql = "UPDATE reserved SET paymentStatus='paid',paymentTime=NOW() WHERE driver_id =:driver_id AND res_id = :res_id AND passenger_id =:passenger_id";
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(':driver_id'=>$driver_id,':res_id'=>$res_id,':passenger_id'=>$passenger_id));
        if ($stmt->rowCount() == 1) {
            header("location: index.php?reservation&$res_alias&select&pay&driver_id=$driver_id&res_id=$res_id&success");
        } else {
            echo "<script>Materialize.toast('Unable to update payment status',4000);</script>";
        }
    } catch(PDOException $e) {
        $error = $e->getMessage();
    }
}

?>
