<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=movefree', "root", "Spellingbee@1");
}catch(PDOException $e){
    die($e->getMessage());
}