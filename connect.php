<?php

    $servername = "localhost";
    $user = "root";
    $pass = "";
    $db = "newweb_db";

    $title_name = array(
        'index' => 'หน้าหลัก',
        'insert' => 'เพิ่มข้อมูล',
        'update' => 'แก้ไขข้อมูล',
        'login' => 'เข้าสู่ระบบ',
        'register' => 'สมัครสมาชิก',
    );



    try {
    $conn = new PDO("mysql:server=$servername;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>  