<?php
include("../config.php");
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

<body>
    <?php include('../user_nav.php') ?>

    <div class="button-container">
        <button class="btn" id="reminder-button" onclick="redirectTo('reminder.php')">Reminder</button>
        <button class="btn" id="reminder-button" onclick="redirectTo('notification.php')">Back</button>
    </div>
    <br>

    <div class="container">
        <h2>Message Details</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $selectedNotificationID = $_POST['notificationID'];

            $query = "SELECT * FROM notification WHERE UserID = 1 AND NotificationID = $selectedNotificationID";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die('Query failed: ' . mysqli_error($conn));
            }

            $row = mysqli_fetch_assoc($result);

            $updateQuery = "UPDATE notification SET IsRead = 1 WHERE NotificationID = $selectedNotificationID";
            mysqli_query($conn, $updateQuery);

            $_SESSION['IsRead'][$selectedNotificationID] = 1;

            mysqli_free_result($result);
        }

        if (isset($row)) {
            echo "<p>User ID: {$row['UserID']}</p>";
            echo "<p>Content: {$row['Content']}</p>";
            echo "<p>Timestamp: {$row['Timestamp']}</p>";

            if (isset($_SESSION['IsRead'][$selectedNotificationID]) && $_SESSION['IsRead'][$selectedNotificationID] == 1) {
                echo '<p><i class="fa-solid fa-check-double"></i> Sent</p>';
            }
        } else {
            echo "<p>No message selected</p>";
        }
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