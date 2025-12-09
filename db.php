<?php
$host = "localhost";
$db = "taskmaster_db";
$user = "root";
$pass =  "";

try{
    $conn = new PDO("mysql:host=$host;dbname=$db", $user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "connected successfully";
}catch(PDOException $e){
    echo "Connection failed" . $e->getMessage();
}
