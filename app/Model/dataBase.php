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

function getAllgrade($connection)
{
    $stmt = $connection->prepare("SELECT * FROM user 
    INNER JOIN student
    ON user.id = student.user_id_student  ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function getAllchoose_lesson_info_all($connection)
{
    $stmt = $connection->prepare("SELECT * FROM `choose_lesson_info_all` ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}
function get_grade_all($connection)
{
    $stmt = $connection->prepare("SELECT * FROM `grade_all` ");
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

function getmartabe_elmi($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM martabe_elmi WHERE id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function getstudentreshteTahsili_id_($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM user 
    INNER JOIN student
    ON user.id = student.user_id_student   WHERE student.reshteTahsili_id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}
function getstudentreshteTahsili_id_2($id, $connection)
{
    $stmt = $connection->prepare("SELECT user.id'student_id', presentation.id, lesson_course.name'lesson_course_name' , educational_group.name'educational_group_name' , user.fname'teacher_fname' , user.lname'teacher_lname' , classroom.class_code , presentation.capacity, presentation.day, presentation.class_time ,presentation.presentation_code , presentation_reshteh.resteh_tahsili_id FROM presentation INNER JOIN lesson_course ON presentation.lessonCourse_id=lesson_course.id INNER JOIN educational_group ON presentation.educationalGroup_id=educational_group.id INNER JOIN user ON user.type_id=1 AND presentation.teacher_id=user.id INNER JOIN classroom ON presentation.classRoom_id=classroom.id INNER JOIN presentation_reshteh on presentation_reshteh.id=presentation.id WHERE presentation_reshteh.resteh_tahsili_id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function getgrade_all_id($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `grade_all` WHERE grade_all.teacher_id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}
function getgrade_all_student_id($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `grade_all` WHERE grade_all.student_id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function getchoose_lesson_info_all_id($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `choose_lesson_info_all` WHERE choose_lesson_info_all.teacher_id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function getgrade_id($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `garde`  WHERE chooseLesson_id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}


function getpresentation_id( )
{
    $stmt = DBConnection()->prepare("
    SELECT user.id'student_id', presentation.id, lesson_course.name'lesson_course_name' , educational_group.name'educational_group_name' , user.fname'teacher_fname' , user.lname'teacher_lname' , classroom.class_code , presentation.capacity, presentation.day, presentation.class_time ,presentation.presentation_code , presentation_reshteh.resteh_tahsili_id FROM presentation INNER JOIN lesson_course ON presentation.lessonCourse_id=lesson_course.id INNER JOIN educational_group ON presentation.educationalGroup_id=educational_group.id INNER JOIN user ON user.type_id=1 AND presentation.teacher_id=user.id INNER JOIN classroom ON presentation.classRoom_id=classroom.id INNER JOIN presentation_reshteh on presentation_reshteh.id=presentation.id 
");

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}
function getlesson_id($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `lesson_course`   WHERE id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function getemployment_type($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `employment_type` WHERE id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}


function getteaching_type($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `teaching_type` WHERE id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function getmadrak_type($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `madrak` WHERE id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function geteducational_group($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `educational_group` WHERE  id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function gethoze_doroos($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `hoze_doroos` WHERE  id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}


function getmaghtae($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `maghtae` WHERE  id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}


function getreshte_tahsili($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `reshte_tahsili` WHERE   id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function getterm_vorod($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `term_vorod` WHERE  id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}


function getnobate_paziresh($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `nobate_paziresh` WHERE   id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}


function getvazeiate_nezam_vazife($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `vazeiate_nezam_vazife` WHERE   id=:id  ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
}


function getlastestUserData($connection)
{
    $stmt = $connection->prepare("SELECT * FROM user ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}

function getAllusersType($type, $connection)
{

    switch (true) {
        case $type == 'teacher':
            $type = 1;
            break;
        case $type == 'student':
            $type = 3;
            break;
        case $type == 'employee':
            $type = 2;
            break;
        case $type == 'admin':
            $type = 4;
            break;

    }
    // var_dump($type);
    $stmt = $connection->prepare("SELECT * FROM user where type_id = :type ");
    $stmt->bindparam("type", $type, PDO::PARAM_INT);
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
    $statement = $conn->prepare("DELETE FROM `user` WHERE `user`.`id`=:id");
    $statement->bindparam(":id", $id);
    $statement->execute();
    return $statement ?? false;
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
        $statement->bindparam("type_id", $type, PDO::PARAM_INT);
        $statement->bindparam("fname", $fname);
        $statement->bindparam("lname", $lname);
        $statement->bindparam("email", $email);
        $statement->bindparam("tell", $tell);
        $statement->bindparam("m_code", $m_code);
        $statement->bindparam("address", $address);
        $hash_seryalnumber= openssl_encrypt($serial_number, "AES-256-CBC", 'secret');
        $statement->bindparam("serial_number", $hash_seryalnumber);
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

function createUser_Common($connection, $data)
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

  

    //echo '<pre>';
//
//var_dump($output = openssl_encrypt("hello", "AES-256-CBC", 'secret'));
//$o= $output;
//
//var_dump($output = openssl_decrypt($o, "AES-256-CBC", 'secret'));
////var_dump(base64_decode("This is really secret!"));
//echo '</pre>';
    $hash_seryalnumber= openssl_encrypt($serial_number, "AES-256-CBC", 'secret');
    $stmt->bindparam(':serial_number', $hash_seryalnumber);
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
        $stmt = $connection->prepare("INSERT INTO `lesson_course` (resteh_tahsili_id,name, code, type, saat_amali, saat_teori, pishniaz, code_pishniaz, 
vahed_amali, vahed_teori, created_at)
                                        VALUES (:resteh_tahsili_id,:name, :code, :type, :saat_amali, :saat_teori, :pishniaz, :code_pishniaz, 
                                        :vahed_amali, :vahed_teori, :created_at)");
        $stmt->bindparam(':name', $name);
        $stmt->bindparam(':code', $code, PDO::PARAM_INT);
        $stmt->bindparam(':resteh_tahsili_id', $resteh_tahsili_id, PDO::PARAM_INT);
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
function lessonCourse_reshtehtahsili_Get_id($id, $conn)
{
    $statement = $conn->prepare("SELECT * FROM `lesson_course` WHERE lesson_course.resteh_tahsili_id=:id");
    $statement->bindparam("id", $id);
    $statement->execute();
    $lessonCourse_id = $statement->fetchAll(PDO::FETCH_OBJ);

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


function createGrade($connection, $data)
{
    try {
        extract($data);
        $stmt = $connection->prepare("
INSERT INTO `garde`( `grade_value`, `student_id`, `chooseLesson_id`, `created_at`) 
   VALUES (:grade,:student_id,:choose_lesson_id,:created_at)
   ");
        $stmt->bindparam(':grade', $grade);
        $stmt->bindparam(':student_id',$student_id );
        $stmt->bindparam(':choose_lesson_id', $choose_lesson_id);
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

function grade_update($id, $data, $conn)
{    extract($data);

  //  echo $grade;die;
    try {


        $statement = $conn->prepare("
UPDATE `garde` SET 
     `grade_value`=:grade
,   `updated_at`=:updated_at
WHERE  `id`=:id ");
        $statement->bindparam(":id", $id, PDO::PARAM_INT);
        $statement->bindparam(":grade", $grade);
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

function grade_delete_id($id, $conn)
{
    $statement = $conn->prepare("DELETE FROM `garde` WHERE `garde`.`id`=:id;");
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

function getallowCapacity_choose($id, $conn)
{
    $statement = $conn->prepare("SELECT * FROM `Capacity_choose` where `presentation_id`= :id");
    $statement->bindparam("id", $id);
    $statement->execute();
    $classroom_id = $statement->fetch(PDO::FETCH_OBJ);

    return $classroom_id ? $classroom_id : false;
}
function getallper_choose_exist($id, $conn)
{
    $statement = $conn->prepare("SELECT * FROM `Capacity_choose_all` WHERE Capacity_choose_all.presentation_id=:id");
    $statement->bindparam("id", $id);
    $statement->execute();
    $classroom_id = $statement->fetch(PDO::FETCH_OBJ);

    return $classroom_id ? $classroom_id : false;
}
function getallowuniq_row_choose($id1,$id2, $conn)
{
    $statement = $conn->prepare(" SELECT * FROM `UNIQUE_choos_row` 
WHERE UNIQUE_choos_row.stuednt_id=:id1 AND UNIQUE_choos_row.presentation_id=:id2
 ");
    $statement->bindparam("id1", $id1);
    $statement->bindparam("id2", $id2);
    $statement->execute();
    $classroom_id = $statement->fetch(PDO::FETCH_OBJ);
    return $classroom_id ? $classroom_id : false;
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

    return $educationalgroup_id ? $educationalgroup_id : false;
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
  , `updated_at`=:updated_at
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

    return $chooselesson_id ? $chooselesson_id : false;
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
    $stmt = $connection->prepare("SELECT * FROM `presentation_capacity` ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array

}
function getidlesson_course($connection,$id)
{
    $stmt = $connection->prepare("SELECT * FROM `lesson_course` WHERE `id`=:id ");
    $stmt->bindparam("id", $id);
    $stmt->execute();
     $data= $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
    return $data ? $data : false;
}

function getideducational_group($connection,$id)
{
    $stmt = $connection->prepare("SELECT * FROM `educational_group` WHERE  `id`=:id ");
    $stmt->bindparam("id", $id);
    $stmt->execute();
     $data= $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
    return $data ? $data : false;
}
function getidreshteh_tahsili_group($connection,$id)
{
    $stmt = $connection->prepare("SELECT * FROM `reshte_tahsili`  WHERE  `id`=:id ");
    $stmt->bindparam("id", $id);
    $stmt->execute();
     $data= $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
    return $data ? $data : false;
}

function getid_classroom_group($connection,$id)
{
    $stmt = $connection->prepare("SELECT * FROM `classroom`  WHERE  `id`=:id ");
    $stmt->bindparam("id", $id);
    $stmt->execute();
     $data= $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
    return $data ? $data : false;
}

function getid_user_end($connection,$id)
{
    $stmt = $connection->prepare("SELECT * FROM `user` WHERE  `id`=:id ");
    $stmt->bindparam("id", $id);
    $stmt->execute();
    $data= $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
    return $data ? $data : false;
}
function getid_student_all_end($connection,$id)
{
    $stmt = $connection->prepare("SELECT * FROM `student_all` WHERE  `user_id_student`=:id ");
    $stmt->bindparam("id", $id);
    $stmt->execute();
    $data= $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
    return $data ? $data : false;
}
function getid_choose_lesson_info_all_studentid_end($connection,$id)
{
    $stmt = $connection->prepare("SELECT * FROM `choose_lesson_info_all` WHERE choose_lesson_info_all.student_id=:id ");
    $stmt->bindparam("id", $id);
    $stmt->execute();
    $data= $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
    return $data ? $data : false;
}
function getid_teacher_all_end($connection,$id)
{
    $stmt = $connection->prepare("SELECT * FROM `teacher_all` WHERE  `teacher_user_id`=:id ");
    $stmt->bindparam("id", $id);
    $stmt->execute();
    $data= $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
    return $data ? $data : false;
}
function getid_persentation_end($connection,$id)
{
    $stmt = $connection->prepare("SELECT * FROM `presentation_capacity` WHERE presentation_capacity.teacher_id=:id ");
    $stmt->bindparam("id", $id);
    $stmt->execute();
    $data= $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
    return $data ? $data : false;
}
function getid_presentation_reshteh_($connection,$id)
{
    $stmt = $connection->prepare("SELECT * FROM `presentation_reshteh` WHERE presentation_reshteh.resteh_tahsili_id=:id ");
    $stmt->bindparam("id", $id);
    $stmt->execute();
    $data= $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
    return $data ? $data : false;
}

function getid_news_end($connection,$id)
{
    $stmt = $connection->prepare("SELECT * FROM `news` WHERE news.author=:id  ");
    $stmt->bindparam("id", $id);
    $stmt->execute();
    $data= $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
    return $data ? $data : false;
}

function getid_teacher_user_group($connection)
{
    $stmt = $connection->prepare("SELECT * FROM `user` WHERE `type_id`=1 ");
    $stmt->execute();
     $data= $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
    return $data ? $data : false;
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
          presentation_code,
          created_at
          )
           VALUES (
           :lessonCourse_id, 
           :educationalGroup_id,
           :teacher_id,
           :classRoom_id, 
           :capacity,
           :day,
           :class_time,
           :presentation_code,
           :created_at
           )
           ");
        $stmt->bindparam(':lessonCourse_id', $lessonCourse_id, PDO::PARAM_INT);
        $stmt->bindparam(':educationalGroup_id', $educationalGroup_id, PDO::PARAM_INT);
        $stmt->bindparam(':teacher_id', $teacher_id, PDO::PARAM_INT);
        $stmt->bindparam(':classRoom_id', $classRoom_id, PDO::PARAM_INT);
        $stmt->bindparam(':capacity', $capacity,PDO::PARAM_INT);
        $stmt->bindparam(':day', $day);
        $stmt->bindparam(':class_time', $class_time);
        $stmt->bindparam(':presentation_code', $presentation_code);
        date_default_timezone_set('Asia/Tehran');
        $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
        return $stmt->execute() ? true : false;

    } catch (Exception $e) {
       echo  $e;
    }
}

function presentation_update($id, $data, $conn)
{
    extract($data);
    try {
     //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
        $statement->bindparam("capacity", $capacity,PDO::PARAM_INT);
        $statement->bindparam("day", $day);
        $statement->bindparam("class_time", $class_time);
        $statement->bindparam("presentation_code", $presentation_code);
        date_default_timezone_set('Asia/Tehran');
        $statement->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
        return $statement->execute() ? true : false;
        // echo a message to say the UPDATE succeeded
       // echo $statement->rowCount() . " records UPDATED successfully";
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

    return $presentation_id ? $presentation_id : false;
}

function presentation_delete_id($id, $conn)
{
    $statement = $conn->prepare("DELETE FROM `finalproject`.`presentation` WHERE  `id`=:id;");
    $statement->bindparam("id", $id);
    $statement->execute();
    return $statement ? $statement : false;
}

// -------- End Model Code Of Presentation Tabel --------

// -------- Start Model Code Of User UnCommonality Tabels --------

function getAllteacher($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `teacher` WHERE teacher_user_id=:id ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
}


function getAllstudent($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `student` WHERE user_id_student=:id ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ); //Convert Tabel To Array
}


function getAllemploy($id, $connection)
{
    $stmt = $connection->prepare("SELECT * FROM `employee`  WHERE  user_id_employ=:id ");
    $stmt->bindparam("id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}


function createTeacher_un_commonality($connection, $teacher_user_id, $codeModares,
                                      $martabeElmi_id, $employmentType_id,
                                      $teachingType_id, $madrak_id,
                                      $educationalGroup_id, $hozeDoroos_id)
{

    $stmt = $connection->prepare("INSERT INTO `teacher` ( teacher_user_id ,codeModares, martabeElmi_id, employmentType_id, 
teachingType_id, madrak_id, educationalGroup_id, hozeDoroos_id, created_at)
                                        VALUES ( :teacher_user_id,:codeModares, :martabeElmi_id, :employmentType_id, :teachingType_id,
                                         :madrak_id, :educationalGroup_id, :hozeDoroos_id, :created_at)");
    $stmt->bindparam(':teacher_user_id', $teacher_user_id, PDO::PARAM_INT);
    $stmt->bindparam(':codeModares', $codeModares);
    $stmt->bindparam(':martabeElmi_id', $martabeElmi_id, PDO::PARAM_INT);
    $stmt->bindparam(':employmentType_id', $employmentType_id, PDO::PARAM_INT);
    $stmt->bindparam(':teachingType_id', $teachingType_id, PDO::PARAM_INT);
    $stmt->bindparam(':madrak_id', $madrak_id, PDO::PARAM_INT);
    $stmt->bindparam(':educationalGroup_id', $educationalGroup_id, PDO::PARAM_INT);
    $stmt->bindparam(':hozeDoroos_id', $hozeDoroos_id, PDO::PARAM_INT);
    date_default_timezone_set('Asia/Tehran');
    $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
    return $stmt->execute() ? true : false;

}

function updateTeacher_un_commonality($connection, $teacher_user_id, $codeModares,
                                      $martabeElmi_id, $employmentType_id,
                                      $teachingType_id, $madrak_id,
                                      $educationalGroup_id, $hozeDoroos_id)
{
    $stmt = $connection->prepare("
UPDATE `teacher` SET 
                  `teacher_user_id`=:teacher_user_id,
                   `codeModares`=:codeModares,
                   `martabeElmi_id`=:martabeElmi_id,
                   `employmentType_id`=:employmentType_id,
                   `teachingType_id`=:teachingType_id,
                   `madrak_id`= :madrak_id,
                   `educationalGroup_id`=:educationalGroup_id,
                   `hozeDoroos_id`=:hozeDoroos_id,
                   `updated_at`=:updated_at  WHERE  `teacher_user_id`=:teacher_user_id        
    ");
    $stmt->bindparam(':teacher_user_id', $teacher_user_id, PDO::PARAM_INT);
    $stmt->bindparam(':codeModares', $codeModares);
    $stmt->bindparam(':martabeElmi_id', $martabeElmi_id, PDO::PARAM_INT);
    $stmt->bindparam(':employmentType_id', $employmentType_id, PDO::PARAM_INT);
    $stmt->bindparam(':teachingType_id', $teachingType_id, PDO::PARAM_INT);
    $stmt->bindparam(':madrak_id', $madrak_id, PDO::PARAM_INT);
    $stmt->bindparam(':educationalGroup_id', $educationalGroup_id, PDO::PARAM_INT);
    $stmt->bindparam(':hozeDoroos_id', $hozeDoroos_id, PDO::PARAM_INT);
    date_default_timezone_set('Asia/Tehran');
    $stmt->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
    return $stmt->execute() ? true : false;

}


function createEmploy_un_commonality($connection,
                                     $employ_user_id,
                                     $codeStandard
)
{

    $stmt = $connection->prepare("INSERT INTO `employee` ( user_id_employ ,codeStandard, created_at)
                                        VALUES ( :user_id_employ,:codeStandard,:created_at)");
    $stmt->bindparam(':user_id_employ', $employ_user_id, PDO::PARAM_INT);
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


    $stmt = $connection->prepare("INSERT INTO `student` ( 
                       user_id_student ,codeDaneshjo,
                       maghtae_id ,reshteTahsili_id , termVorod_id ,
                       nobatePaziresh_id ,vazeiateNezamVazife_id
                        , created_at)
          VALUES ( :user_id_student,:codeDaneshjo,:maghtae_id,
                  :reshteTahsili_id,:termVorod_id,:nobatePaziresh_id,
                  :vazeiateNezamVazife_id,:created_at)");
    $stmt->bindparam(':user_id_student', $student_user_id, PDO::PARAM_INT);
    $stmt->bindparam(':codeDaneshjo', $codeDaneshjo);
    $stmt->bindparam(':maghtae_id', $maghtae_id, PDO::PARAM_INT);
    $stmt->bindparam(':reshteTahsili_id', $reshteTahsili_id, PDO::PARAM_INT);
    $stmt->bindparam(':termVorod_id', $termVorod_id, PDO::PARAM_INT);
    $stmt->bindparam(':nobatePaziresh_id', $nobatePaziresh_id, PDO::PARAM_INT);
    $stmt->bindparam(':vazeiateNezamVazife_id', $vazeiateNezamVazife_id, PDO::PARAM_INT);
    date_default_timezone_set('Asia/Tehran');
    $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
    return $stmt->execute() ? true : false;

}


function updateStudent_un_commonality($connection,
                                      $user_id_student,
                                      $codeDaneshjo,
                                      $maghtae_id, $reshteTahsili_id,
                                      $termVorod_id, $nobatePaziresh_id,
                                      $vazeiateNezamVazife_id
)
{
    try {
        //check for "example" in mail address
        $stmt = $connection->prepare("UPDATE `student` SET 
                   `user_id_student`=:user_id_student,
                   `codeDaneshjo`=:codeDaneshjo,
                   `maghtae_id`=:maghtae_id,
                   `reshteTahsili_id`=:reshteTahsili_id,
                   `termVorod_id`=:termVorod_id,
                   `nobatePaziresh_id`=:nobatePaziresh_id,
                   `vazeiateNezamVazife_id`=:vazeiateNezamVazife_id,
                   `updated_at`= :updated_at  WHERE  `user_id_student`=:user_id_student ");

        $stmt->bindparam(':user_id_student', $user_id_student, PDO::PARAM_INT);
        $stmt->bindparam(':codeDaneshjo', $codeDaneshjo);
        $stmt->bindparam(':maghtae_id', $maghtae_id, PDO::PARAM_INT);
        $stmt->bindparam(':reshteTahsili_id', $reshteTahsili_id, PDO::PARAM_INT);
        $stmt->bindparam(':termVorod_id', $termVorod_id, PDO::PARAM_INT);
        $stmt->bindparam(':nobatePaziresh_id', $nobatePaziresh_id, PDO::PARAM_INT);
        $stmt->bindparam(':vazeiateNezamVazife_id', $vazeiateNezamVazife_id, PDO::PARAM_INT);
        date_default_timezone_set('Asia/Tehran');
        $stmt->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
        return $stmt->execute() ? true : false;
    } catch (Exception $e) {
        echo $e;
    }

}

function updateEmploy_un_commonality($connection,
                                     $employ_user_id,
                                     $codeStandard
)
{

    $stmt = $connection->prepare("UPDATE `employee` SET 
                   `user_id_employ`=:user_id_employ,
                    `codeStandard`=:codeStandard,
                    `updated_at`=updated_at WHERE `user_id_employ`=:user_id_employ
");
    $stmt->bindparam(':user_id_employ', $employ_user_id, PDO::PARAM_INT);
    $stmt->bindparam(':codeStandard', $codeStandard);
    date_default_timezone_set('Asia/Tehran');
    $stmt->bindparam(':updated_at', date("Y-m-d H:i:s", time()));
    return $stmt->execute() ? true : false;

}


function create_un_commonality($connection,
                               $employ_user_id,
                               $codeStandard
)
{

    $stmt = $connection->prepare("INSERT INTO `employee` ( user_id_employ ,codeStandard, created_at)
                                        VALUES ( :user_id_employ,:codeStandard,:created_at)");
    $stmt->bindparam(':user_id_employ', $employ_user_id, PDO::PARAM_INT);
    $stmt->bindparam(':codeStandard', $codeStandard);
    date_default_timezone_set('Asia/Tehran');
    $stmt->bindparam(':created_at', date("Y-m-d H:i:s", time()));
    return $stmt->execute() ? true : false;

}

// -------- End Model Code Of User UnCommonality Tabels --------