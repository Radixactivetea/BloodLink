<?php
include('../config.php');

// Variables
$action = "";
$id = "";
$donateDate = "";
$donateTime = "";
$location = "";
$remark = "";

// This block is called when the Submit button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Values for add or edit
    $id = $_POST["donationID"];
    $donateDate = $_POST["donateDate"];
    $donateTime = $_POST["donateTime"];
    $location = trim($_POST["location"]);
    $remark = trim($_POST["remark"]);

    // Update query
    $sql = "UPDATE donation SET donateDate = '$donateDate', donateTime = '$donateTime', location = '$location', remark = '$remark' WHERE donationID = $id";
    
    // Call the function to update the database table
    $status = update_DBTable($conn, $sql);

    if ($status) {
        echo "Form data updated successfully!<br>";
        echo '<a href="donation_history.php">Back</a>';
    } else {
        echo '<a href="donation_history.php">Back</a>';
    }
}

// Close the database connection
mysqli_close($conn);

// Function to update data in the database table
function update_DBTable($conn, $sql) {
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
        return false;
    }
}
?>
