<?php
include('../config.php');
session_start();

// Variables
$action = "";
$id = "";
$donateDate = "";
$donateTime = "";
$location = "";
$remark = "";
$userID = $_SESSION["UID"];

// This block is called when the Submit button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Values for add or edit
    $donateDate = isset($_POST["donateDate"]) ? $_POST["donateDate"] : "";
    $donateTime = isset($_POST["donateTime"]) ? $_POST["donateTime"] : "";
    $location = isset($_POST["location"]) ? trim($_POST["location"]) : "";
    $remark = isset($_POST["remark"]) ? trim($_POST["remark"]) : "";

    // Check if required fields are not empty
    if (!empty($donateDate) && !empty($donateTime) && !empty($location) && !empty($remark)) {
        // Escape and quote the values to prevent SQL injection
        $donateDate = mysqli_real_escape_string($conn, $donateDate);
        $donateTime = mysqli_real_escape_string($conn, $donateTime);
        $location = mysqli_real_escape_string($conn, $location);
        $remark = mysqli_real_escape_string($conn, $remark);

        $sql = "INSERT INTO donation (userID,donateDate, donateTime, location, remark)
                VALUES ('$userID', '$donateDate', '$donateTime', '$location', '$remark')";

        $status = insertTo_DBTable($conn, $sql);

        if ($status) {
            echo "Form data saved successfully!<br>";
            echo '<a href="donation_history.php">Back</a>';
        } else {
            echo '<a href="donation_history.php">Back</a>';
        }
    } else {
        echo "Invalid form data. Please make sure all required fields are filled.<br>";
        echo '<a href="donation_history.php">Back</a>';
    }
}

// Close db connection
mysqli_close($conn);

// Function to insert data into the database table
function insertTo_DBTable($conn, $sql) {
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
        return false;
    }
}
?>
