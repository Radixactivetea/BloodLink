<?php
session_start();
include('../config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BloodLink</title>
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav_footer.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/9aa99ba8cc.js" crossorigin="anonymous"></script>
    <style>
        .bio input {
            background-color: whitesmoke;
            text-align: left;
            border-radius: 15px;
            padding: 8px;
            border: none;
        }

        .picture input {
            border-radius: 15px;
            border: 1px solid black;
        }

        button {
            background-color: #0868a9;
            padding: 2px 15px;
            color: white;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php
    include('../user_nav.php');

    $sqlProfile = 'SELECT * FROM profile WHERE userID=' . $_SESSION["UID"];
    $resultProfile = mysqli_query($conn, $sqlProfile);
    $sqlMedical = 'SELECT * FROM medical_history WHERE userID=' . $_SESSION["UID"];
    $resultMedical = mysqli_query($conn, $sqlMedical);
    $sqluser = 'SELECT * FROM user WHERE userID=' . $_SESSION["UID"];
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
        } else {
            $img = "default.png";
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
    <form action="edit_profile_action.php" method="POST" enctype="multipart/form-data">
        <main>
            <h1>Edit Profile</h1>
            <div class="profile">
                <div class="picture">
                    <div class="dp">
                        <img src="img/<?= $img ?>" alt="Profile Picture">
                        <input type="file" name="fileToUpload" id="fileToUpload" accept=".jpg, .jpeg, .png">
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
                                <td><input type="text" id="allergies" name="allergies" value='<?= $allergies ?>'></td>
                            </tr>
                            <tr>
                                <th>Medications :</th>
                                <td><input type="text" id="medications" name="medications" value='<?= $medications ?>'></td>
                            </tr>
                            <tr>
                                <th>Past Surgeries :</th>
                                <td><input type="text" id="pastSurgeries" name="pastSurgeries" value='<?= $pastSurgeries ?>'></td>
                            </tr>
                            <tr>
                                <th>Family History :</th>
                                <td><input type="text" id="familyHistory" name="familyHistory" value='<?= $familyHistory ?>'></td>
                            </tr>
                            <tr>
                                <th>Medical Conditions :</th>
                                <td><input type="text" id="medicalConditions" name="medicalConditions" value='<?= $medicalConditions ?>'></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="bioframe">
                    <div class="bio">
                        <div class="edit">
                            <button type="submit">Submit</button>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label class="title">First Name</label>
                                <input type="text" id="firstname" name="firstname" value='<?= $firstname ?>'>
                            </div>
                            <div class="column">
                                <label class="title">Last Name</label>
                                <input type="text" id="lastname" name="lastname" value='<?= $lastname ?>'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column" style="width: 24%;">
                                <label class="title">Gender</label>
                                <select size="1" name="gender">
                                    <option value="">&nbsp;</option>
                                    <?php
                                    if ($gender == "male")
                                        echo '<option value="male" selected>male</option>';
                                    else
                                        echo '<option value="male">male</option>';
                                    if ($gender == "female")
                                        echo '<option value="female" selected>female</option>';
                                    else
                                        echo '<option value="female">female</option>';
                                    ?>
                                </select>
                            </div>
                            <div class="column" style="width: 24%;">
                                <label class="title">Height</label>
                                <input type="text" id="height" name="height" value='<?= $height ?> cm'>
                            </div>
                            <div class="column" style="width: 24%;">
                                <label class="title">Weight</label>
                                <input type="text" id="weight" name="weight" value='<?= $weight ?> kg'>
                            </div>
                            <div class="column" style="width: 24%;">
                                <label class="title">Blood Type</label>
                                <input type="text" id="bloodtype" name="bloodtype" value='<?= $bloodtype ?>'>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column">
                                <label class="title">Date Of Birth</label>
                                <input type="date" id="dob" name="dob" value='<?= $dob ?>'>
                            </div>
                            <div class="column">
                                <label class="title">Phone Number</label>
                                <input type="text" id="phonenum" name="phonenum" value='<?= $phonenum ?>'>
                            </div>
                        </div>
                        <div class="row" style="text-align: center;">
                            <div class="column " style="width: 100%;">
                                <label class="title">Address</label>
                                <input type="text" id="address" name="address" value='<?= $address ?>'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </form>
    <?php include('../footer.php') ?>
</body>

</html>