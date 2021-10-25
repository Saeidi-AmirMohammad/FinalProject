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

function getAllUserData($connection)
{
    $stmt = $connection->prepare("SELECT * FROM user");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function getLoginUser($connection, $m_code)
{
    $stmt = $connection->prepare("SELECT * FROM user where `m_code`= :m_code");
    $stmt->bindparam(':m_code', $m_code);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ); //Convert Tabel To Array
    return $user ? $user : false;
}