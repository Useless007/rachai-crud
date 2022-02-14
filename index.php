<?php

session_start();
require_once __DIR__ . '/connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once __DIR__ . '/pge/head.php'; ?>
    <link rel="stylesheet" href="../css/loading.css">
    <title><?= $title_name['index']?></title>
</head>

<?php
require('pge/navbar.php');
?>

<body><br><br><br>

    <?php
    require('knowladge/view.php')
    ?>



	
	<div class="loader-wrapper">
    	<div class="cat">
    	<div class="cat__body"></div>
    	<div class="cat__body"></div>
    	<div class="cat__tail"></div>
    	<div class="cat__head"></div>
  		</div>
    </div>

    

    <?php require_once __DIR__ . '/pge/footer.php' ?>
    <?php require_once __DIR__ . '/swal/swal.php' ?>

    <script>
        $('.rem').on('click', function(e) {
            e.preventDefault();

            const href = $(this).attr('href')
            Swal.fire({
                title: 'ต้องการลบใช่ไหม?',
                text: "หากลบแล้วจะไม่สามารถกู้คืนได้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่!',
                cancelButtonText: 'ไม่'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })
        })
		$(document).ready(function() {
  		 window.setTimeout("fadeonload();", 1500);
 		})

		function fadeonload() {
   		$(".loader-wrapper").fadeOut('slow');
		}
    </script>
</body>

</html>