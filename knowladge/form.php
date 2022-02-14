<?php

session_start();
require('../connect.php');
require('../swal/swal.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once __DIR__ . '/../pge/head.php' ?> 
    <title><?= $title_name['insert']?></title>
    <style>
        .container{
            max-width: 70%;
        }
    </style>
</head>
<?php
require('../pge/navbar.php');
?>

<body>

    <br>
    <div class="container">
        <form action="" method="post">
            <div class="row form-group">
                <div class="col">
                    <label for="std">รหัสนักศึกษา :</label>
                    <input type="text" class="form-control" id="std" name="m_stuid">
                </div>
                <div class="col">
                    <label for="grade">ปีการศึกษา :</label>
                    <input type="text" class="form-control" id="grad" name="m_grade">
                </div>
            </div>
            <div class="row form-group">
                <div class="col">
                    <label for="Name">ชื่อ :</label>
                    <input type="text" class="form-control" id="Name" name="m_fname">
                </div>
                <div class="col">
                    <label for="Surname">นามสกุล :</label>
                    <input type="text" class="form-control" id="Surname" name="m_lname">
                </div>
            </div>
            <div class="form-group">
                <label for="age">อายุ :</label>
                <input type="number" class="form-control" id="age" name="m_age">
            </div>
            <div class="form-group">
                <label for="imgur">ไฟล์รูปภาพตัวเอง :</label>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" id="imgur_input">
                        <input type="text" id="imgur_out" name="m_picture" value="" hidden>
                    </div>
                </div>
            </div>
        
            <button type="submit" name="submit" class="btn btn-success">ตกลง</button>
            <button name="reset" class="btn btn-danger">ยกเลิก</button>

    </div>
    </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        
        $m_stuid = $_POST['m_stuid'];
        $m_fname = $_POST['m_fname'];
        $m_lname = $_POST['m_lname'];
        $m_age = $_POST['m_age'];
        $m_grade = $_POST['m_grade'];
        $m_picture = $_POST['m_picture'];
        if ($m_stuid == '' || $m_fname == '' || $m_lname == '' || $m_age == '' || $m_grade == '') {
            echo "<script>
                        error();
                  </script>";
        } else {

            if (empty($_POST['m_picture'])) {
                $m_picture = 'https://notebookspec.com/web/wp-content/uploads/2013/08/Facebook-no-profile-picture-icon-620x389.jpg';
                $sql = 'INSERT INTO `member` (`m_stuid`, `m_fname`, `m_lname`, `m_age`, `m_grade`,  `m_picture`) VALUES (:m_stuid, :m_fname, :m_lname, :m_age, :m_grade, :m_picture)' ;
                $q = $conn->prepare($sql);
                $q->bindParam(':m_stuid', $m_stuid);
                $q->bindParam(':m_fname', $m_fname);
                $q->bindParam(':m_lname', $m_lname);
                $q->bindParam(':m_age', $m_age);
                $q->bindParam(':m_grade', $m_grade);
                $q->bindParam(':m_picture', $m_picture);
                $q->execute();

            echo "<script>
                        success();
                  </script>
             ";
            } else {

                $sql = 'INSERT INTO `member` (`m_stuid`, `m_fname`, `m_lname`, `m_age`, `m_grade`,  `m_picture`) VALUES (:m_stuid, :m_fname, :m_lname, :m_age, :m_grade, :m_picture)' ;
                $q = $conn->prepare($sql);
                $q->bindParam(':m_stuid', $m_stuid);
                $q->bindParam(':m_fname', $m_fname);
                $q->bindParam(':m_lname', $m_lname);
                $q->bindParam(':m_age', $m_age);
                $q->bindParam(':m_grade', $m_grade);
                $q->bindParam(':m_picture', $m_picture);
                $q->execute();

            echo "<script>
                        success();
                  </script>
             ";
            }
        }
    }

    ?>


    <?php require_once __DIR__ . '/../pge/footer.php' ?>

    <script>
        const file = document.getElementById("imgur_input")
        const post = document.getElementById("imgur_out")
        file.addEventListener("change", ev => {
            const formdata = new FormData()
            formdata.append("image", ev.target.files[0])
            fetch("https://api.imgur.com/3/image", {
                method: "post",
                headers: {
                    Authorization: "Client-ID c9bc1dd75425224"
                },
                body: formdata
            }).then(data => data.json()).then(data => {
                post.value = data.data.link
            })
			waiting();
        })
    </script>

</body>

</html>