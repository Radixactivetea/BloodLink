<?php
include("../config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodLink</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/nav_footer.css">
    <script src="https://kit.fontawesome.com/9aa99ba8cc.js" crossorigin="anonymous"></script>
</head>

<style>

</style>

<body>
    <?php include('../user_nav.php') ?>

    <div class="button-container">
        <button class="btn" id="status-button" onclick="redirectTo('status.php')">Status</button>
        <button class="btn" id="reminder-button" onclick="redirectTo('notification.php')">Back</button>
    </div>
    <br>

    <form action="status.php" method="post">
        <div class="container">
            <h2>Select Reminder Message</h2>
            <i class="fa-sharp fa-solid fa-user-tie"></i>
            <select name="notificationID" class="form-select">
                <?php
                $query = "SELECT * FROM notification WHERE userID=".$_SESSION["UID"];
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    die('Query failed: ' . mysqli_error($conn));
                }

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['NotificationID']}'>{$row['Content']}</option>";
                }


                ?>
            </select>
            <?php
            if($row = mysqli_fetch_assoc($result) >0){
                echo '<button type="submit">Send</button>';
                }
                mysqli_free_result($result);

                mysqli_close($conn);
            ?>
        </div>
    </form>

    <?php include('../footer.php') ?>

    <script>
        function redirectTo(page) {
            window.location.href = page;
        }
    </script>
</body>

</html>