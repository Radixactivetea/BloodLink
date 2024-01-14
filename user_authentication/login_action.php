<?php
session_start();
include("../config.php");
include('../message.php');


//login values from login form
$email = $_POST['email'];
$pswd = $_POST['pswd'];

$sql = "SELECT * FROM user WHERE 	userEmail='$email' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    //check password hash
    $row = mysqli_fetch_assoc($result);
    if (password_verify($_POST['pswd'], $row['userPwd'])) {
        $_SESSION["UID"] = $row["userID"]; //the first record set, bind to userID
        //set logged in time
        $_SESSION['loggedin_time'] = time();
        messageBox("WELCOME to BloodLink");
        header("refresh:2;URL=../home folder/home.php");
    } else {
        messageBox("WARNING :: Username and Password didn't match!\n Try Again");
        header("refresh:3;URL=../index.php");
    }
} else {
    messageBox("WARNING :: Username doesn't exist! \n Please register");
    header("refresh:3;URL=../index.php");
}

mysqli_close($conn);
?>