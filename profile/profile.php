<?php
session_start();
include('../config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BloodLink</title>
    <p>This is added to show conflict number 2</p>
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav_footer.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/9aa99ba8cc.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if(!isset($_SESSION["UID"])){
        header("location:../index.php");
    }
    include('../user_nav.php');

    $firstname = "";
    $lastname = "";
    $gender = "";
    $height = "";
    $weight = "";
    $bloodtype = "";
    $dob = "";
    $phonenum = "";
    $address = "";
    $img = "default.png";

    $email = "";

    $allergies = "";
    $medications = "";
    $pastSurgeries = "";
    $familyHistory = "";
    $medicalConditions = "";

    $sqlProfile = 'SELECT * FROM profile WHERE userID='. $_SESSION["UID"];
    $resultProfile = mysqli_query($conn, $sqlProfile);
    $sqlMedical = 'SELECT * FROM medical_history WHERE userID='. $_SESSION["UID"];
    $resultMedical = mysqli_query($conn, $sqlMedical);
    $sqluser = 'SELECT * FROM user WHERE userID='. $_SESSION["UID"];
    $resultuser = mysqli_query($conn, $sqluser);
    
    if (mysqli_num_rows($resultProfile) > 0) {
        $row = mysqli_fetch_assoc($resultProfile);

        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $gender = $row["gender"];
        $height = $row["height"];
        $weight = $row["weight"];
        $bloodtype = $row["bloodtype"];
        $dob = $row["dob"];
        $phonenum = $row["phonenum"];
        $address = $row["address"];
        if($row["img_path"] != NULL){
            $img = $row["img_path"];
        }
    }

    if (mysqli_num_rows($resultMedical) > 0) {
        $row = mysqli_fetch_assoc($resultMedical);

        $allergies = $row["allergies"];
        $medications = $row["medications"];
        $pastSurgeries = $row["past_surgeries"];
        $familyHistory = $row["family_history"];
        $medicalConditions = $row["medical_conditions"];
    }

    if (mysqli_num_rows($resultuser) > 0) {
        $row = mysqli_fetch_assoc($resultuser);

        $email = $row["userEmail"];
    }
    ?>
    <main>
        <h1>My Profile</h1>
        <div class="profile">
            <div class="picture">
                <div class="dp">
                    <img src="img/<?=$img?>" alt="Profile Picture">
                </div>
                <div class="email">
                    <label><?= $email ?></label>
                </div>
                <div style="width: 310px;">
                    <table class="medical">
                        <tr>
                            <td colspan="2" style="text-align: center;">Medical History</td>
                        </tr>
                        <tr>
                            <th>Allergies :</th>
                            <td><?= $allergies ?></td>
                        </tr>
                        <tr>
                            <th>Medications :</th>
                            <td><?= $medications ?></td>
                        </tr>
                        <tr>
                            <th>Past Surgeries :</th>
                            <td><?= $pastSurgeries ?></td>
                        </tr>
                        <tr>
                            <th>Family History :</th>
                            <td><?= $familyHistory ?></td>
                        </tr>
                        <tr>
                            <th>Medical Conditions :</th>
                            <td><?= $medicalConditions ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="bioframe">
                <div class="bio">
                    <div class="edit"><a href="edit_profile.php">edit</a></div>
                    <div class="row">
                        <div class="column">
                            <label class="title">First Name</label>
                            <label class="content"><?= $firstname ?></label>
                        </div>
                        <div class="column">
                            <label class="title">Last Name</label>
                            <label class="content"><?= $lastname ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column" style="width: 24%;">
                            <label class="title">Gender</label>
                            <label class="content"><?= $gender ?></label>
                        </div>
                        <div class="column" style="width: 24%;">
                            <label class="title">Height</label>
                            <label class="content"><?= $height ?>cm</label>
                        </div>
                        <div class="column" style="width: 24%;">
                            <label class="title">Weight</label>
                            <label class="content"><?= $weight ?>kg</label>
                        </div>
                        <div class="column" style="width: 24%;">
                            <label class="title">Blood Type</label>
                            <label class="content"><?= $bloodtype ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <label class="title">Date Of Birth</label>
                            <label class="content"><?= $dob ?></label>
                        </div>
                        <div class="column">
                            <label class="title">Phone Number</label>
                            <label class="content"><?= $phonenum ?></label>
                        </div>
                    </div>
                    <div class="row" style="text-align: center;">
                        <div class="column " style="width: 100%;">
                            <label class="title">Address</label>
                            <label class="content"><?= $address ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include('../footer.php') ?>
</body>

</html>
