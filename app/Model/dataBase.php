<?php
function DBConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "@Am41145481311.";

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
function getAllUserDataTeacher($connection)
{
    $stmt = $connection->prepare("SELECT * FROM user 
    INNER JOIN teacher
    ON user.id = teacher.teacher_user_id  ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function getAllUserDataStudent($connection)
{
    $stmt = $connection->prepare("SELECT * FROM user 
    INNER JOIN student
    ON user.id = student.user_id_student  ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function getAllUserDataemploee($connection)
{
    $stmt = $connection->prepare("SELECT * FROM user 
    INNER JOIN employee
    ON user.id = employee.user_id_employ  ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}
function getlastestUserData($connection)
{
    $stmt = $connection->prepare("SELECT * FROM user ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}
function getAllusersType( $type,$connection )
{

    switch (true){
        case $type=='teacher':
            $type=1;
            break;
        case $type=='student':
            $type=3;
            break;
        case $type=='employee':
            $type=2;
            break;
        case $type=='admin':
            $type=4;
            break;

    }
    // var_dump($type);
    $stmt = $connection->prepare("SELECT * FROM user where type_id = :type ");
    $stmt->bindparam("type", $type ,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}


function user_Get_id($id, $conn)
{
    $statement = $conn->prepare("SELECT * FROM user where `id`= :id");
    $statement->bindparam("id", $id);
    $statement->execute();
    $user_id = $statement->fetch(PDO::FETCH_OBJ);

    return $user_id ? $user_id : false;
}

function user_delete_id($id, $conn)
{
    $statement = $conn->prepare("DELETE FROM `finalproject`.`user` WHERE  `id`=:id;");
    $statement->bindparam("id", $id);
    $statement->execute();
    return $statement ? $statement : false;
}

function user_update($id, $data, $conn)
{
    extract($data);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare("UPDATE `user` SET 
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
        $statement->bindparam("id", $id, PDO::PARAM_INT);
        $statement->bindparam("type_id", $type_id, PDO::PARAM_INT);
        $statement->bindparam("fname", $fname);
        $statement->bindparam("lname", $lname);
        $statement->bindparam("email", $email);
        $statement->bindparam("tell", $tell);
        $statement->bindparam("m_code", $m_code);
        $statement->bindparam("address", $address);
        $statement->bindparam("serial_number", $serial_number);
        $statement->bindparam("birthday", $birthday);
        $statement->bindparam("jender", $jender, PDO::PARAM_INT);
        $statement->bindparam("father_name", $father_name);
        $statement->bindparam("birthday_place", $birthday_place);
        $statement->bindparam("mazhab", $mazhab);
        $statement->bindparam("university", $university);
        date_default_timezone_set('Asia/Tehran');
        $statement->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
        return $statement->execute() ? true : false;
        // echo a message to say the UPDATE succeeded
        echo $statement->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
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
    try {
        extract($data);
        $stmt = $connection->prepare("INSERT INTO `reshte_tahsili`
 (name, code, status, created_at)
   VALUES (:name, :code , :status ,:created_at)");
        $stmt->bindparam(':name', $name);
        $stmt->bindparam(':code', $code, PDO::PARAM_INT);
        $stmt->bindparam(':status', $status, PDO::PARAM_INT);
        date_default_timezone_set('Asia/Tehran');
        $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
        return $stmt->execute() ? true : false;

    } catch (Exception $e) {
        $e->getMessage();
    }
}


function reshteTahsili_update($id, $data, $conn)
{
    extract($data);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare("UPDATE `reshte_tahsili` SET 
  `name`=:name  
,  `code`=:code  
,   `status`=:status   
,   `updated_at`=:updated_at
WHERE  `id`=:id ");
        $statement->bindparam("id", $id, PDO::PARAM_INT);
        $statement->bindparam("name", $name);
        $statement->bindparam("code", $code, PDO::PARAM_INT);
        $statement->bindparam("status", $status, PDO::PARAM_INT);
        date_default_timezone_set('Asia/Tehran');
        $statement->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
        return $statement->execute() ? true : false;
        // echo a message to say the UPDATE succeeded
        echo $statement->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function reshteTahsili_Get_id($id, $conn)
{
    $statement = $conn->prepare("SELECT * FROM reshte_tahsili where `id`= :id");
    $statement->bindparam("id", $id);
    $statement->execute();
    $reshteTahsili_id = $statement->fetch(PDO::FETCH_OBJ);

    return $reshteTahsili_id ? $reshteTahsili_id : false;
}

function reshteTahsili_delete_id($id, $conn)
{
    $statement = $conn->prepare("DELETE FROM `finalproject`.`reshte_tahsili` WHERE  `id`=:id;");
    $statement->bindparam("id", $id);
    $statement->execute();
    return $statement ? $statement : false;
}

// -------- End Model Code Of Reshte Tahsili Tabel --------

// -------- Start Model Code Of Lesson Course Tabel --------
function createLessonCourse($connection, $data)
{
    try {
        extract($data);
        $stmt = $connection->prepare("INSERT INTO `lesson_course` (name, code, type, saat_amali, saat_teori, pishniaz, code_pishniaz, 
vahed_amali, vahed_teori, created_at)
                                        VALUES (:name, :code, :type, :saat_amali, :saat_teori, :pishniaz, :code_pishniaz, 
                                        :vahed_amali, :vahed_teori, :created_at)");
        $stmt->bindparam(':name', $name);
        $stmt->bindparam(':code', $code, PDO::PARAM_INT);
        $stmt->bindparam(':type', $type);
        $stmt->bindparam(':saat_amali', $saat_amali, PDO::PARAM_INT);
        $stmt->bindparam(':saat_teori', $saat_teori, PDO::PARAM_INT);
        $stmt->bindparam(':pishniaz', $pishniaz);
        $stmt->bindparam(':code_pishniaz', $code_pishniaz, PDO::PARAM_INT);
        $stmt->bindparam(':vahed_amali', $vahed_amali, PDO::PARAM_INT);
        $stmt->bindparam(':vahed_teori', $vahed_teori, PDO::PARAM_INT);
        date_default_timezone_set('Asia/Tehran');
        $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
        return $stmt->execute() ? true : false;
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }

}

function getAllLessonCourse($connection)
{
    $stmt = $connection->prepare("SELECT * FROM lesson_course");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function lessonCourse_update($id, $data, $conn)
{
    extract($data);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare("UPDATE `lesson_course` SET 
  `name`=:name  
,  `code`=:code  
,   `type`=:type  
,   `saat_amali`=:saat_amali  
,   `saat_teori`=:saat_teori
,   `pishniaz`=:pishniaz  
,   `code_pishniaz`=:code_pishniaz
,   `vahed_amali`=:vahed_amali  
,   `vahed_teori`=:vahed_teori 
,   `updated_at`=:updated_at
WHERE  `id`=:id ");
        $statement->bindparam("id", $id, PDO::PARAM_INT);
        $statement->bindparam("name", $name);
        $statement->bindparam("code", $code, PDO::PARAM_INT);
        $statement->bindparam("type", $type);
        $statement->bindparam("saat_amali", $saat_amali, PDO::PARAM_INT);
        $statement->bindparam("saat_teori", $saat_teori, PDO::PARAM_INT);
        $statement->bindparam("pishniaz", $pishniaz);
        $statement->bindparam("code_pishniaz", $code_pishniaz, PDO::PARAM_INT);
        $statement->bindparam("vahed_amali", $vahed_amali, PDO::PARAM_INT);
        $statement->bindparam("vahed_teori", $vahed_teori, PDO::PARAM_INT);
        date_default_timezone_set('Asia/Tehran');
        $statement->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
        return $statement->execute() ? true : false;
        // echo a message to say the UPDATE succeeded
        echo $statement->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function lessonCourse_Get_id($id, $conn)
{
    $statement = $conn->prepare("SELECT * FROM lesson_course where `id`= :id");
    $statement->bindparam("id", $id);
    $statement->execute();
    $lessonCourse_id = $statement->fetch(PDO::FETCH_OBJ);

    return $lessonCourse_id ? $lessonCourse_id : false;
}

function lessonCourse_delete_id($id, $conn)
{
    $statement = $conn->prepare("DELETE FROM `finalproject`.`lesson_course` WHERE  `id`=:id;");
    $statement->bindparam("id", $id);
    $statement->execute();
    return $statement ? $statement : false;
}

// -------- End Model Code Of Lesson Course Tabel --------

// -------- Start Model Code Of News Tabel --------
function getAllNews($connection)
{
    $stmt = $connection->prepare("SELECT * FROM news");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function createNews($connection, $data)
{
    try {
        extract($data);
        $stmt = $connection->prepare("INSERT INTO `news`
 (author, title, description, date, created_at)
   VALUES (:author, :title , :description , :date ,:created_at)");
        $stmt->bindparam(':author', $author);
        $stmt->bindparam(':title', $title);
        $stmt->bindparam(':description', $description);
        $stmt->bindparam(':date', $date);
        date_default_timezone_set('Asia/Tehran');
        $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
        return $stmt->execute() ? true : false;

    } catch (Exception $e) {
        $e->getMessage();
    }
}


function news_update($id, $data, $conn)
{
    extract($data);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare("UPDATE `news` SET 
  `author`=:author  
,  `title`=:title  
,   `description`=:description
,   `date`=:date     
,   `updated_at`=:updated_at
WHERE  `id`=:id ");
        $statement->bindparam("id", $id, PDO::PARAM_INT);
        $statement->bindparam("author", $author);
        $statement->bindparam("title", $title);
        $statement->bindparam("description", $description);
        $statement->bindparam("date", $date);
        date_default_timezone_set('Asia/Tehran');
        $statement->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
        return $statement->execute() ? true : false;
        // echo a message to say the UPDATE succeeded
        echo $statement->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function news_Get_id($id, $conn)
{
    $statement = $conn->prepare("SELECT * FROM news where `id`= :id");
    $statement->bindparam("id", $id);
    $statement->execute();
    $news_id = $statement->fetch(PDO::FETCH_OBJ);

    return $news_id ? $news_id : false;
}

function news_delete_id($id, $conn)
{
    $statement = $conn->prepare("DELETE FROM `finalproject`.`news` WHERE  `id`=:id;");
    $statement->bindparam("id", $id);
    $statement->execute();
    return $statement ? $statement : false;
}

// -------- End Model Code Of News Tabel --------

// -------- Start Model Code Of TermVorod Tabel --------

function getAllTermVorod($connection)
{
    $stmt = $connection->prepare("SELECT * FROM term_vorod");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function createTermVorod($connection, $data)
{
    try {
        extract($data);
        $stmt = $connection->prepare("INSERT INTO `term_vorod`
 (number, created_at)
   VALUES (:number,:created_at)");
        $stmt->bindparam(':number', $number);
        date_default_timezone_set('Asia/Tehran');
        $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
        return $stmt->execute() ? true : false;

    } catch (Exception $e) {
        $e->getMessage();
    }
}


function termvorod_update($id, $data, $conn)
{
    extract($data);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare("UPDATE `term_vorod` SET 
  `number`=:number 
,   `updated_at`=:updated_at
WHERE  `id`=:id ");
        $statement->bindparam("id", $id, PDO::PARAM_INT);
        $statement->bindparam("number", $number);
        date_default_timezone_set('Asia/Tehran');
        $statement->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
        return $statement->execute() ? true : false;
        // echo a message to say the UPDATE succeeded
        echo $statement->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function termvorod_Get_id($id, $conn)
{
    $statement = $conn->prepare("SELECT * FROM term_vorod where `id`= :id");
    $statement->bindparam("id", $id);
    $statement->execute();
    $termvorod_id = $statement->fetch(PDO::FETCH_OBJ);

    return $termvorod_id ? $termvorod_id : false;
}

function termvorod_delete_id($id, $conn)
{
    $statement = $conn->prepare("DELETE FROM `finalproject`.`term_vorod` WHERE  `id`=:id;");
    $statement->bindparam("id", $id);
    $statement->execute();
    return $statement ? $statement : false;
}

// -------- End Model Code Of TermVorod Tabel --------

// -------- Start Model Code Of ClassRoom Tabel --------

function getAllClassRoom($connection)
{
    $stmt = $connection->prepare("SELECT * FROM classroom");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}



function createClassRoom($connection, $data)
{
    try {
        extract($data);
        $stmt = $connection->prepare("INSERT INTO `classroom`
 (class_code, created_at)
   VALUES (:class_code,:created_at)");
        $stmt->bindparam(':class_code', $class_code);
        date_default_timezone_set('Asia/Tehran');
        $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
        return $stmt->execute() ? true : false;

    } catch (Exception $e) {
        $e->getMessage();
    }
}


function classroom_update($id, $data, $conn)
{
    extract($data);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare("UPDATE `classroom` SET 
  `class_code`=:class_code 
,   `updated_at`=:updated_at
WHERE  `id`=:id ");
        $statement->bindparam("id", $id, PDO::PARAM_INT);
        $statement->bindparam("class_code", $class_code);
        date_default_timezone_set('Asia/Tehran');
        $statement->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
        return $statement->execute() ? true : false;
        // echo a message to say the UPDATE succeeded
        echo $statement->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function classroom_Get_id($id, $conn)
{
    $statement = $conn->prepare("SELECT * FROM classroom where `id`= :id");
    $statement->bindparam("id", $id);
    $statement->execute();
    $classroom_id = $statement->fetch(PDO::FETCH_OBJ);

    return $classroom_id ? $classroom_id : false;
}

function classroom_delete_id($id, $conn)
{
    $statement = $conn->prepare("DELETE FROM `finalproject`.`classroom` WHERE  `id`=:id;");
    $statement->bindparam("id", $id);
    $statement->execute();
    return $statement ? $statement : false;
}

// -------- End Model Code Of ClassRoom Tabel --------

// -------- Start Model Code Of EducationalGroup Tabel --------

function getAllEducationalGroup($connection)
{
    $stmt = $connection->prepare("SELECT * FROM educational_group");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}





function createEducationalGroup($connection, $data)
{
    try {
        extract($data);
        $stmt = $connection->prepare("INSERT INTO `educational_group`
 (name, created_at)
   VALUES (:name,:created_at)");
        $stmt->bindparam(':name', $name);
        date_default_timezone_set('Asia/Tehran');
        $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
        return $stmt->execute() ? true : false;

    } catch (Exception $e) {
        $e->getMessage();
    }
}


function educationalgroup_update($id, $data, $conn)
{
    extract($data);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare("UPDATE `educational_group` SET 
  `name`=:name 
,   `updated_at`=:updated_at
WHERE  `id`=:id ");
        $statement->bindparam("id", $id, PDO::PARAM_INT);
        $statement->bindparam("name", $name);
        date_default_timezone_set('Asia/Tehran');
        $statement->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
        return $statement->execute() ? true : false;
        // echo a message to say the UPDATE succeeded
        echo $statement->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function educationalgroup_Get_id($id, $conn)
{
    $statement = $conn->prepare("SELECT * FROM educational_group where `id`= :id");
    $statement->bindparam("id", $id);
    $statement->execute();
    $educationalgroup_id = $statement->fetch(PDO::FETCH_OBJ);

    return  $educationalgroup_id ?  $educationalgroup_id : false;
}

function educationalgroup_delete_id($id, $conn)
{
    $statement = $conn->prepare("DELETE FROM `finalproject`.`educational_group` WHERE  `id`=:id;");
    $statement->bindparam("id", $id);
    $statement->execute();
    return $statement ? $statement : false;
}

// -------- End Model Code Of EducationalGroup Tabel --------

// -------- Start Model Code Of ChooseLesson Tabel --------

function getAllChooseLesson($connection)
{
    $stmt = $connection->prepare("SELECT * FROM choose_lesson");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function createChooseLesson($connection, $data)
{
    try {
        extract($data);
        $stmt = $connection->prepare("INSERT INTO `choose_lesson`
 (stuednt_id, presentation_id, created_at)
   VALUES (:stuednt_id, :presentation_id, :created_at)");
        $stmt->bindparam(':stuednt_id', $stuednt_id);
        $stmt->bindparam(':presentation_id', $presentation_id);
        date_default_timezone_set('Asia/Tehran');
        $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
        return $stmt->execute() ? true : false;

    } catch (Exception $e) {
        $e->getMessage();
    }
}


function chooselesson_update($id, $data, $conn)
{
    extract($data);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare("UPDATE `choose_lesson` SET 
  `stuednt_id`=:stuednt_id
  , `presentation_id`=:presentation_id
,   `updated_at`=:updated_at
WHERE  `id`=:id ");
        $statement->bindparam("id", $id, PDO::PARAM_INT);
        $statement->bindparam("stuednt_id", $stuednt_id);
        $statement->bindparam("presentation_id", $presentation_id);
        date_default_timezone_set('Asia/Tehran');
        $statement->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
        return $statement->execute() ? true : false;
        // echo a message to say the UPDATE succeeded
        echo $statement->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function chooselesson_Get_id($id, $conn)
{
    $statement = $conn->prepare("SELECT * FROM choose_lesson where `id`= :id");
    $statement->bindparam("id", $id);
    $statement->execute();
    $chooselesson_id = $statement->fetch(PDO::FETCH_OBJ);

    return  $chooselesson_id ?  $chooselesson_id : false;
}

function chooselesson_delete_id($id, $conn)
{
    $statement = $conn->prepare("DELETE FROM `finalproject`.`choose_lesson` WHERE  `id`=:id;");
    $statement->bindparam("id", $id);
    $statement->execute();
    return $statement ? $statement : false;
}

// -------- End Model Code Of ChooseLesson Tabel --------

// -------- Start Model Code Of Presentation Tabel --------

function getAllPresentaion($connection)
{
    $stmt = $connection->prepare("SELECT * FROM presentation");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function createPresentaion($connection, $data)
{
    try {
        extract($data);
        $stmt = $connection->prepare("INSERT INTO `presentation`
         (
          lessonCourse_id,
          educationalGroup_id,
          teacher_id,
          classRoom_id,
          capacity,
          day,
          class_time,
          presentation_code)
           VALUES (
           :lessonCourse_id, 
           :educationalGroup_id,
           :teacher_id,
           :classRoom_id, 
           :capacity,
           :day,
           :class_time,
           :presentation_code)
           ");
        $stmt->bindparam(':lessonCourse_id', $lessonCourse_id, PDO::PARAM_INT);
        $stmt->bindparam(':educationalGroup_id', $educationalGroup_id, PDO::PARAM_INT);
        $stmt->bindparam(':teacher_id', $teacher_id, PDO::PARAM_INT);
        $stmt->bindparam(':classRoom_id', $classRoom_id, PDO::PARAM_INT);
        $stmt->bindparam(':capacity', $capacity, PDO::PARAM_INT);
        $stmt->bindparam(':day', $day);
        $stmt->bindparam(':class_time', $class_time);
        $stmt->bindparam(':presentation_code', $presentation_code);
        date_default_timezone_set('Asia/Tehran');
        $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
        return $stmt->execute() ? true : false;

    } catch (Exception $e) {
         echo $e;
    }
}


function presentation_update($id, $data, $conn)
{
    extract($data);
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = $conn->prepare("UPDATE `presentation` SET 
  `lessonCourse_id`=:lessonCourse_id
  ,`educationalGroup_id`=:educationalGroup_id
  ,`teacher_id`=:teacher_id
  ,`classRoom_id`=:classRoom_id
  ,`capacity`=:capacity
  ,`day`=:day
  ,`class_time`=:class_time
  ,`presentation_code`=:presentation_code
,   `updated_at`=:updated_at
WHERE  `id`=:id ");
        $statement->bindparam("id", $id, PDO::PARAM_INT);
        $statement->bindparam("lessonCourse_id", $lessonCourse_id, PDO::PARAM_INT);
        $statement->bindparam("educationalGroup_id", $educationalGroup_id, PDO::PARAM_INT);
        $statement->bindparam("teacher_id", $teacher_id, PDO::PARAM_INT);
        $statement->bindparam("classRoom_id", $classRoom_id, PDO::PARAM_INT);
        $statement->bindparam("capacity", $capacity, PDO::PARAM_INT);
        $statement->bindparam("day", $day);
        $statement->bindparam("class_time", $class_time);
        $statement->bindparam("presentation_code", $presentation_code, PDO::PARAM_INT);
        date_default_timezone_set('Asia/Tehran');
        $statement->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
        return $statement->execute() ? true : false;
        // echo a message to say the UPDATE succeeded
        echo $statement->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
}

function presentation_Get_id($id, $conn)
{
    $statement = $conn->prepare("SELECT * FROM presentation where `id`= :id");
    $statement->bindparam("id", $id);
    $statement->execute();
    $presentation_id = $statement->fetch(PDO::FETCH_OBJ);

    return  $presentation_id ?  $presentation_id : false;
}

function presentation_delete_id($id, $conn)
{
    $statement = $conn->prepare("DELETE FROM `finalproject`.`presentation` WHERE  `id`=:id;");
    $statement->bindparam("id", $id);
    $statement->execute();
    return $statement ? $statement : false;
}

// -------- End Model Code Of Presentation Tabel --------

// -------- Start Model Code Of Teacher Tabel --------

function createTeacher_un_commonality($connection, $teacher_user_id, $codeModares,
                                                   $martabeElmi_id, $employmentType_id,
                                                   $teachingType_id, $madrak_id,
                                                   $educationalGroup_id, $hozeDoroos_id)
{

    $stmt = $connection->prepare("INSERT INTO `teacher` ( teacher_user_id ,codeModares, martabeElmi_id, employmentType_id, 
teachingType_id, madrak_id, educationalGroup_id, hozeDoroos_id, created_at)
                                        VALUES ( :teacher_user_id,:codeModares, :martabeElmi_id, :employmentType_id, :teachingType_id,
                                         :madrak_id, :educationalGroup_id, :hozeDoroos_id, :created_at)");
    $stmt->bindparam(':teacher_user_id', $teacher_user_id ,PDO::PARAM_INT);
    $stmt->bindparam(':codeModares', $codeModares);
    $stmt->bindparam(':martabeElmi_id', $martabeElmi_id ,PDO::PARAM_INT);
    $stmt->bindparam(':employmentType_id', $employmentType_id ,PDO::PARAM_INT);
    $stmt->bindparam(':teachingType_id', $teachingType_id ,PDO::PARAM_INT);
    $stmt->bindparam(':madrak_id', $madrak_id ,PDO::PARAM_INT);
    $stmt->bindparam(':educationalGroup_id', $educationalGroup_id ,PDO::PARAM_INT);
    $stmt->bindparam(':hozeDoroos_id', $hozeDoroos_id ,PDO::PARAM_INT);
    date_default_timezone_set('Asia/Tehran');
    $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
    return $stmt->execute() ? true : false;

}


function createEmploy_un_commonality($connection,
    $employ_user_id,
    $codeStandard
)
{

    $stmt = $connection->prepare("INSERT INTO `employee` ( user_id_employ ,codeStandard, created_at)
                                        VALUES ( :user_id_employ,:codeStandard,:created_at)");
    $stmt->bindparam(':user_id_employ', $employ_user_id ,PDO::PARAM_INT);
    $stmt->bindparam(':codeStandard', $codeStandard);
    date_default_timezone_set('Asia/Tehran');
    $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
    return $stmt->execute() ? true : false;

}


function createStudent_un_commonality($connection,
                                      $student_user_id,
                                      $codeDaneshjo,
                                      $maghtae_id, $reshteTahsili_id,
                                      $termVorod_id, $nobatePaziresh_id,
                                      $vazeiateNezamVazife_id
)
{
//    <<<HTML
//
//INSERT INTO `student` (`id`, `user_id_student`,
// `codeDaneshjo`, `maghtae_id`, `reshteTahsili_id`,
//  `termVorod_id`, `nobatePaziresh_id`, `vazeiateNezamVazife_id`,
//   `created_at`, `updated_at`) VALUES (NULL, '79', '4145455', '2', '10', '4', '2', '4', NULL, NULL);
//
//HTML;
//

    $stmt = $connection->prepare("INSERT INTO `student` ( 
                       user_id_student ,codeDaneshjo,
                       maghtae_id ,reshteTahsili_id , termVorod_id ,
                       nobatePaziresh_id ,vazeiateNezamVazife_id
                        , created_at)
          VALUES ( :user_id_student,:codeDaneshjo,:maghtae_id,
                  :reshteTahsili_id,:termVorod_id,:nobatePaziresh_id,
                  :vazeiateNezamVazife_id,:created_at)");
    $stmt->bindparam(':user_id_student', $student_user_id ,PDO::PARAM_INT);
    $stmt->bindparam(':codeDaneshjo', $codeDaneshjo);
    $stmt->bindparam(':maghtae_id', $maghtae_id ,PDO::PARAM_INT);
    $stmt->bindparam(':reshteTahsili_id', $reshteTahsili_id ,PDO::PARAM_INT);
    $stmt->bindparam(':termVorod_id', $termVorod_id ,PDO::PARAM_INT);
    $stmt->bindparam(':nobatePaziresh_id', $nobatePaziresh_id ,PDO::PARAM_INT);
    $stmt->bindparam(':vazeiateNezamVazife_id', $vazeiateNezamVazife_id ,PDO::PARAM_INT);
    date_default_timezone_set('Asia/Tehran');
    $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
    return $stmt->execute() ? true : false;

}




function create_un_commonality($connection,
                                     $employ_user_id,
                                     $codeStandard
)
{

    $stmt = $connection->prepare("INSERT INTO `employee` ( user_id_employ ,codeStandard, created_at)
                                        VALUES ( :user_id_employ,:codeStandard,:created_at)");
    $stmt->bindparam(':user_id_employ', $employ_user_id ,PDO::PARAM_INT);
    $stmt->bindparam(':codeStandard', $codeStandard);
    date_default_timezone_set('Asia/Tehran');
    $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
    return $stmt->execute() ? true : false;

}


// -------- End Model Code Of Teacher Tabel --------