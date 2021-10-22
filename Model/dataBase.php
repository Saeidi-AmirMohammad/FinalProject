<?php
function DBConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=finalproject", $username, $password);
        return $conn;

        // echo "Connected successfully";
    } catch (PDOException $e) {
        // echo "Connection failed: " . $e->getMessage();
        die($e->getMessage());
    }
}

function userGet($connection)
{
    $stmt = $connection->prepare("SELECT * FROM user");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ); //Convert Tabel To Array
    
}
