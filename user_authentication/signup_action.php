<?php
include('../config.php');
include('../message.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pswd = mysqli_real_escape_string($conn, $_POST['pswd']);
    $confirmpswd = mysqli_real_escape_string($conn, $_POST['confirmpswd']);

    if ($pswd !== $confirmpswd) {
        messageBox("Password and confirm password do not match.");
        header("refresh:3;URL=../index.php");
    } else {
        $sql = "SELECT * FROM user WHERE userEmail='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            messageBox("User exists. Please register as a new user");
            header("refresh:3;URL=../index.php");
        } else {
            $pwdHash = trim(password_hash($_POST['pswd'], PASSWORD_DEFAULT));

            $sql = "INSERT INTO user (userEmail, userPwd) VALUES ('$email', '$pwdHash')";

            if (mysqli_query($conn, $sql)) {
                messageBox("<p>New user record created successfully.</p>");
                $lastInsertedId = mysqli_insert_id($conn);
                $sql = "INSERT INTO profile (userID) VALUES ('$lastInsertedId')";

                if (mysqli_query($conn, $sql)) {
                    $SuccessMessage = "Congratulations! You have successfully registered. Please log in to access your account.";
                    messageBox($SuccessMessage);
                    header("refresh:3;URL=../index.php");
                } else {
                    $errorMessage = "Error: " . $sql . "<br>" . mysqli_error($conn);
                    messageBox($errorMessage);
                    header("refresh:3;URL=../index.php");
                }
            } else {
                $errorMessage = "Error: " . $sql . "<br>" . mysqli_error($conn);
                messageBox($errorMessage);
                header("refresh:3;URL=../index.php");
            }
        }
    }
}
mysqli_close($conn);
