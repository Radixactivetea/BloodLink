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
        <button class="btn" id="reminder-button" onclick="redirectTo('reminder.php')">Reminder</button>
        <button class="btn" id="status-button" onclick="redirectTo('status.php')">Status</button>
    </div>
    <br>

    <div class="container">
        <h2>Messages</h2>
        <?php
        $query = "SELECT * FROM notification WHERE UserID=".$_SESSION["UID"];
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die('Query failed: ' . mysqli_error($conn));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<p>Content: {$row['Content']}</p>";
            echo "<p>Timestamp: {$row['Timestamp']}</p>";

            if ($row['IsRead'] == 1) {
                echo '<p><i class="fa-solid fa-check-double"></i> Read</p>';
            } else {
                echo '<p><i class="fa-solid fa-envelope"></i> Unread</p>';
            }

            echo "</div>";
        }

        mysqli_free_result($result);
        ?>
    </div>

    <?php include('../footer.php') ?>

    <script>
        function redirectTo(page) {
            window.location.href = page;
        }
    </script>
</body>

</html>