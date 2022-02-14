<?php

session_start();
require('../connect.php');
require('../swal/swal.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once __DIR__ . '/../pge/head.php' ?> 
    <title><?= $title_name['register']?></title>
</head>
<body>
    

<?php require_once __DIR__ . '/../pge/footer.php' ?>
</body>
</html>