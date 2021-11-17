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
// -------- Start Model Code Of User Tabel --------
function getAllUserData($connection)
{
    $stmt = $connection->prepare("SELECT * FROM user");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}


function user_Get_id($id , $conn){
    $statement=$conn->prepare("SELECT * FROM user where `id`= :id");
    $statement->bindparam("id",$id);
    $statement->execute();
    $user_id     = $statement->fetch(PDO::FETCH_OBJ);

    return $user_id ? $user_id:false;
}

function user_delete_id($id , $conn){
    $statement=$conn->prepare("DELETE FROM `finalproject`.`user` WHERE  `id`=:id;");
    $statement->bindparam("id",$id);
    $statement->execute();
    return $statement ? $statement:false;
}

function user_update($id, $data , $conn){
    extract($data);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement=$conn->prepare("UPDATE `user` SET 
`type_id`=:type_id
,  `fname`=:fname  
,  `lname`=:lname  
,   `email`=:email  
,   `tell`=:tell  
,   `birthday`=:birthday
,   `m_code`=:m_code  
,   `birthday_place`=:birthday_place
,   `address`=:address  
,   `jender`=:jender
,   `serial_number`=:serial_number  
,   `father_name`=:father_name  
,   `mazhab`=:mazhab  
,   `university`=:university   
,   `updated_at`=:updated_at
WHERE  `id`=:id ");
         $statement->bindparam("id",$id,PDO::PARAM_INT);
         $statement->bindparam("type_id",$type_id,PDO::PARAM_INT);
        $statement->bindparam("fname",$fname);
        $statement->bindparam("lname",$lname);
        $statement->bindparam("email",$email);
        $statement->bindparam("tell",$tell);
        $statement->bindparam("m_code",$m_code);
        $statement->bindparam("address",$address);
        $statement->bindparam("serial_number",$serial_number);
        $statement->bindparam("birthday",$birthday);
        $statement->bindparam("jender",$jender,PDO::PARAM_INT);
        $statement->bindparam("father_name",$father_name);
        $statement->bindparam("birthday_place",$birthday_place);
        $statement->bindparam("mazhab",$mazhab);
        $statement->bindparam("university",$university);
        date_default_timezone_set('Asia/Tehran');
        $statement->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
        return  $statement->execute()? true : false;
        // echo a message to say the UPDATE succeeded
        echo $statement->rowCount() . " records UPDATED successfully";
    } catch(PDOException $e) {
        echo   "<br>" . $e->getMessage();
    }
}



function getLoginUser($connection, $m_code)
{
    $stmt = $connection->prepare("SELECT * FROM user where `m_code`= :m_code");
    $stmt->bindparam(':m_code', $m_code);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ); //Convert Tabel To Array
    return $user ? $user : false;
}

function createUser($connection, $data)
{
    extract($data);
    $stmt = $connection->prepare("INSERT INTO `user` (fname, lname, email, tell, m_code, address, serial_number, 
birthday, jender, father_name, birthday_place, mazhab, university, type_id, created_at)
                                        VALUES (:fname, :lname, :email, :tell, :m_code, :address, :serial_number, 
                                        :birthday, :jender, :father_name, :birthday_place, :mazhab, :university, :type_id, 
                                        :created_at)");
    $stmt->bindparam(':fname', $fname);
    $stmt->bindparam(':lname', $lname);
    $stmt->bindparam(':email', $email);
    $stmt->bindparam(':tell', $tell);
    $stmt->bindparam(':m_code', $m_code);
    $stmt->bindparam(':address', $address);
    $stmt->bindparam(':serial_number', $serial_number);
    $stmt->bindparam(':birthday', $birthday);
    $stmt->bindparam(':jender', $jender, PDO::PARAM_INT);
    $stmt->bindparam(':father_name', $father_name);
    $stmt->bindparam(':birthday_place', $birthday_place);
    $stmt->bindparam(':mazhab', $mazhab);
    $stmt->bindparam(':university', $university);
    $stmt->bindparam(':type_id', $type, PDO::PARAM_INT);
    date_default_timezone_set('Asia/Tehran');
    $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
    return $stmt->execute() ? true : false;

}
// -------- End Model Code Of User Tabel --------

// -------- Start Model Code Of Reshte Tahsili Tabel --------
function getAllReshteTahsili($connection)
{
    $stmt = $connection->prepare("SELECT * FROM reshte_tahsili");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function createReshteTahsili($connection, $data)
{
   try{
       extract($data);
       $stmt = $connection->prepare("INSERT INTO `reshte_tahsili`
 (name, code, status, created_at)
   VALUES (:name, :code , :status ,:created_at)");
       $stmt->bindparam(':name', $name);
       $stmt->bindparam(':code', $code , PDO::PARAM_INT);
       $stmt->bindparam(':status', $status , PDO::PARAM_INT);
       date_default_timezone_set('Asia/Tehran');
       $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
       return $stmt->execute() ? true : false;

   }catch (Exception $e){
       $e->getMessage();
   }
}


function reshteTahsili_update($id, $data , $conn){
    extract($data);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement=$conn->prepare("UPDATE `reshte_tahsili` SET 
,  `name`=:name  
,  `code`=:code  
,   `status`=:status   
,   `updated_at`=:updated_at
WHERE  `id`=:id ");
        $statement->bindparam("id",$id,PDO::PARAM_INT);
        $statement->bindparam("name",$name);
        $statement->bindparam("code", $code , PDO::PARAM_INT);
        $statement->bindparam("status", $status , PDO::PARAM_INT);
        date_default_timezone_set('Asia/Tehran');
        $statement->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
        return  $statement->execute()? true : false;
        // echo a message to say the UPDATE succeeded
        echo $statement->rowCount() . " records UPDATED successfully";
    } catch(PDOException $e) {
        echo   "<br>" . $e->getMessage();
    }
}

function reshteTahsili_Get_id($id , $conn){
    $statement=$conn->prepare("SELECT * FROM reshte_tahsili where `id`= :id");
    $statement->bindparam("id",$id);
    $statement->execute();
    $reshteTahsili_id = $statement->fetch(PDO::FETCH_OBJ);

    return $reshteTahsili_id ? $reshteTahsili_id:false;
}

function reshteTahsili_delete_id($id , $conn){
    $statement=$conn->prepare("DELETE FROM `finalproject`.`reshte_tahsili` WHERE  `id`=:id;");
    $statement->bindparam("id",$id);
    $statement->execute();
    return $statement ? $statement:false;
}

