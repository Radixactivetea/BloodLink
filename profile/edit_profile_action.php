<?php
session_start();
include('../config.php');
include('../message.php');

$target_dir = "img/";
$target_file = "";
$uploadOk = 0;
$imageFileType = "";
$uploadfileName = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $bloodtype = $_POST["bloodtype"];
    $dob = $_POST["dob"];
    $phonenum = $_POST["phonenum"];
    $address = $_POST["address"];

    $allergies = $_POST["allergies"];
    $medications = $_POST["medications"];
    $pastSurgeries = $_POST["pastSurgeries"];
    $familyHistory = $_POST["familyHistory"];
    $medicalConditions = $_POST["medicalConditions"];

    $filetmp = $_FILES["fileToUpload"];
    $uploadfileName = $filetmp["name"];

    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["name"] == "") {

        $sqlprofile = "UPDATE profile SET 
        firstname='$firstname', lastname='$lastname',
        gender='$gender', height='$height',
        weight='$weight', bloodtype='$bloodtype',
        dob='$dob', phonenum='$phonenum',
        address='$address'
        WHERE userID=" . $_SESSION["UID"];

        $sqlmedical = "UPDATE medical_history SET 
        allergies='$allergies', medications='$medications',
        past_surgeries='$pastSurgeries', family_history='$familyHistory',
        medical_conditions='$medicalConditions' WHERE userID=" . $_SESSION["UID"];

        $resultprofile = mysqli_query($conn, $sqlprofile);
        $resultmedical = mysqli_query($conn, $sqlmedical);
        if ($resultprofile && $resultmedical) {
            messageBox("Data updated successfully!");
            header("refresh:2;URL=profile.php");
        } else {
            messageBox("WARNING :: Data not updated! There is something wrong");
            header("refresh:2;URL=profile.php");
        }
    } else if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
        $uploadOk = 1;
        $filetmp = $_FILES["fileToUpload"];
        $uploadfileName = $filetmp["name"];
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            $message = "ERROR: Sorry, image file $uploadfileName already exists.<br>";
            messageBox($message);
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            $message =  "ERROR: Sorry, your file is too large. Try resizing your image.<br>";
            messageBox($message);
            $uploadOk = 0;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $message =  "ERROR: Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
            messageBox($message);
            $uploadOk = 0;
        }

        if ($uploadOk) {
            $sqlprofile = "UPDATE profile SET 
            firstname='$firstname', lastname='$lastname',
            gender='$gender', height='$height',
            weight='$weight', bloodtype='$bloodtype',
            dob='$dob', phonenum='$phonenum',
            address='$address', img_path= '$uploadfileName'
            WHERE userID=" . $_SESSION["UID"];
    
            $sqlmedical = "UPDATE medical_history SET 
            allergies='$allergies', medications='$medications',
            past_surgeries='$pastSurgeries', family_history='$familyHistory',
            medical_conditions='$medicalConditions' WHERE userID=" . $_SESSION["UID"];
    
            $resultprofile = mysqli_query($conn, $sqlprofile);
            $resultmedical = mysqli_query($conn, $sqlmedical);

            if ($resultprofile && $resultmedical) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    messageBox("Form data updated successfully!<br>");
                    header("refresh:2;URL=profile.php");
                } else {
                    messageBox("Sorry, there was an error uploading your file.<br>");
                    header("refresh:2;URL=profile.php");
                }
            }
        } else {
            header("refresh:2;URL=profile.php");
        }
    } else {
        header("refresh:2;URL=profile.php");
    }
}
mysqli_close($conn);
