<?php
function connect (){
    $dsn="mysql:dbname=agencelocationvoitures;host=localhost";
    try {
        $conn= new PDO($dsn,'root','');
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();
    }
    return $conn;
}
?>