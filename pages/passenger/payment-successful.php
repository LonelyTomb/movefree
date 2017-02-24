
<?php
$res_id = $_GET['res_id'];
$driver_id = $_GET['driver_id'];
$passenger_id = $_SESSION['user']['id'];

try{
    require 'processor/connection.php';

    $sql = "SELECT * FROM reserved WHERE driver_id =:driver_id AND res_id = :res_id AND passenger_id =:passenger_id AND paymentStatus='paid'";
    $stmt=$pdo->prepare($sql);
        $stmt->execute(array(':driver_id'=>$driver_id,':res_id'=>$res_id,':passenger_id'=>$passenger_id));
    if ($stmt->rowCount() == 1) {
        try{
            $sql = 'SELECT * FROM reservation WHERE id=:res_id AND user_id=:passenger_id';
            $stmt=$pdo->prepare($sql);
            $stmt->execute(array(':res_id'=>$res_id,':passenger_id'=>$passenger_id));
            $stmt->bindColumn('price', $price);
            $stmt->fetch(PDO::FETCH_BOUND);

            $sql = 'SELECT * FROM users WHERE id=:driver_id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':driver_id'=>$driver_id));
            $stmt->bindColumn('name',$driver_name);
            $stmt->fetch(PDO::FETCH_BOUND);
        } catch (PDOException $e) {
            $error = $e->getMessage();
        }
    }
} catch (PDOException $e) {
    $error = $e->getMessage();
}
?>

<div class='paySuccess row'>
    <div class='col m10 l6'>
        <div class='card-panel'>
            <p>Congratulation you've successfully paid <span class='drivername'><?php echo $driver_name;?></span> for his service at &#8358;<span class='price'><?php echo $price;?></span> </p>
            <p>This Transaction will be saved to your <a href='index.php?history' class='history'>travel history</a></p>
        </div>
    </div>
</div>