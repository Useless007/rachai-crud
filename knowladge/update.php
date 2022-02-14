<?php

require_once('../swal/swal.php');
require_once('../connect.php');
$m_id = $_GET['m_id'];
if (isset($_POST['send'])) {
    $m_stuid = $_POST['m_stuid'];
    $m_fname = $_POST['m_fname'];
    $m_lname = $_POST['m_lname'];
    $m_age = $_POST['m_age'];
    $m_grade = $_POST['m_grade'];
    $m_picture = $_POST['m_picture'];

    $sql = "UPDATE member SET m_stuid = :m_stuid, m_fname = :m_fname, m_lname = :m_lname, m_age = :m_age, m_grade = :m_grade, m_picture = :m_picture WHERE m_id = :m_id ";
    $q = $conn->prepare($sql);
    $q->bindParam(':m_stuid', $m_stuid);
    $q->bindParam(':m_fname', $m_fname);
    $q->bindParam(':m_lname', $m_lname);
    $q->bindParam(':m_age', $m_age);
    $q->bindParam(':m_grade', $m_grade);
    $q->bindParam(':m_id', $m_id);
    $q->bindParam(':m_picture', $m_picture);

    $result = $q->execute();

    if ($result) {
        header("refresh:1;/crud");
    } else {
        echo "error";
    }
}
if (isset($_POST['back'])) {
    header("location:/crud/index");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once __DIR__ . '/../pge/head.php' ?>
    <title><?= $title_name['update'] ?></title>
</head>

<body>
    <?php require('../pge/navbar.php') ?>
    <h1 class="text-center">Update user</h1>


    <div class="container">
        <form class="form-horizontal" method="POST">
            <?php
            $sql = $conn->prepare("SELECT * FROM member WHERE m_id = :m_id");
            $sql->bindParam(':m_id', $m_id);
            $sql->execute();
            $show = $sql->fetch();
            ?>
            <div class="row form-group">
                <div class="col">
                    <label for="std">รหัสนักศึกษา :</label>
                    <input type="text" class="form-control" id="stdid" name="m_stuid" value="<?php echo $show['m_stuid'] ?>">
                </div>
                <div class="col">
                    <label for="grade">ปีการศึกษา :</label>
                    <input type="text" class="form-control" id="grade" name="m_grade" value="<?php echo $show['m_grade'] ?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col">
                    <label for="Name">ชื่อ :</label>
                    <input type="text" class="form-control" id="Name" name="m_fname" value="<?php echo $show['m_fname'] ?>">
                </div>
                <div class="col">
                    <label for="Surname">นามสกุล :</label>
                    <input type="text" class="form-control" id="Surname" name="m_lname" value="<?php echo $show['m_lname'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="age">อายุ :</label>
                <input type="number" class="form-control" id="age" name="m_age" value="<?php echo $show['m_age'] ?>">
            </div>
            <div class="form-group">
                <label for="imgur">ไฟล์รูปภาพตัวเอง :</label>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" id="imgur_input">
                        <a href="<?= $show['m_picture'] ?>"><img id="img" src="<?php echo $show['m_picture'] ?>" style="max-width:80px;"></a>
                        <input type="text" id="imgur_out" name="m_picture" value="<?php echo $show['m_picture'] ?>" hidden>
                    </div>
                </div>
            </div>

            <button type="submit" name="send" class="btn btn-success">ตกลง</button>
            <button name="back" class="btn btn-danger">ยกเลิก</button>
    </div>
    <?php ?>
    </form>
    </div>
    <?php require_once __DIR__ . '/../pge/footer.php' ?>
    <script>
        const file = document.getElementById("imgur_input")
        const post = document.getElementById("imgur_out")
        const showimg = document.getElementById("img")
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
                showing.src = data.data.link
            }).then(
            waiting())
        })
    </script>
</body>

</html>