<?php
session_start();
include('../config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/nav_footer.css">
    <script src="https://kit.fontawesome.com/9aa99ba8cc.js" crossorigin="anonymous"></script>
    <title>BloodLink</title>
    <style>
        body {
            color: white;
        }
    </style>
</head>

<body>
    <?php
    if (!isset($_SESSION["UID"])) {
        include('../public_nav.php');
    } else {
        include('../user_nav.php');
    }
    ?>

    <div class="center">
        <h1>Connecting with us!</h1>
        <div class="socialacc">
            <div class="socialbox" style="background-color: #962fbf;"><i class="fa-brands fa-instagram"></i> Instagram</div>
            <div class="socialbox" style="background-color: #316FF6;"><i class="fa-brands fa-facebook"></i> Facebook</div>
            <div class="socialbox" style="background-color: #000000;"><i class="fa-brands fa-tiktok"></i> Tiktok</div>
            <div class="socialbox" style="background-color: #CD201F;"><i class="fa-brands fa-youtube"></i> Youtube</div>
        </div>
        <h1>Our Gallery</h1>
        <div class="gallery">
            <div class="polaroid">
                <img src="img/3.png" alt="">
            </div>
            <div class="polaroid">
                <img src="img/4.png" alt="">
            </div>
            <div class="polaroid">
                <img src="img/5.png" alt="">
            </div>
            <div class="polaroid">
                <img src="img/6.png" alt="">
            </div>
            <div class="polaroid">
                <img src="img/7.png" alt="">
            </div>
            <div class="polaroid">
                <img src="img/8.png" alt="">
            </div>
            <div class="polaroid">
                <img src="img/9.png" alt="">
            </div>
            <div class="polaroid">
                <img src="img/10.png" alt="">
            </div>
        </div>
    </div>


    <?php include('../footer.php') ?>
</body>

</html>