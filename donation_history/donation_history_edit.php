<?php
include("../config.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>DONATION HISTORY</title>
    <link rel="stylesheet" href="../css/nav_footer.css">
    <link rel="stylesheet" href="css/nina_style.css">
    <script src="https://kit.fontawesome.com/9aa99ba8cc.js" crossorigin="anonymous"></script>
    <style>
        #myTable td {
            color: black;
        }
    </style>
</head>

<body>

    <?php include '../user_nav.php'; ?>

    <div class="heading">
        <h1>Donation History</h1>
        <p>DONATE YOUR BLOOD AND INSPIRE OTHERS TO DONATE.</p>
        <img src="img/blood4.png">
        <h2>You a hero! You don't need to be a Doctor to be a Hero, just donate your blood. </h2>
    </div>

    <?php
    $id = "";
    $donateDate = "";
    $donateTime = "";
    $location = "";
    $remark = "";

  
		 if(isset($_GET["id"]) && $_GET["id"] != ""){
		 $sql = "SELECT * FROM donation WHERE donationID=" . $_GET["id"];
		 //echo $sql . "<br>";
		 $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row["donationID"];
            $donateDate = $row["donateDate"];
            $donateTime = $row["donateTime"];
            $location = $row["location"];
            $remark = $row["remark"];
        }
    }
    mysqli_close($conn);
    ?>

    <div style="padding:0 10px;" id="historyDiv">
        <h3 align="center">Edit Donation Information</h3>
        <p align="center">Required field with mark*</p>
        <form method="POST" action="donation_history_edit_action.php" id="myForm" enctype="multipart/form-data">
            <!--hidden value: id to be submitted to action page-->
            <input type="text" id="donationID" name="donationID" value="<?= $_GET['id'] ?>" hidden>
            <table border="1" id="myTable">
                <tr>
                    <td>Date*</td>
                    <td width="1px">:</td>
                    <td>
                        <input type="date" name="donateDate" value="<?= $donateDate ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Time*</td>
                    <td>:</td>
                    <td>
                        <input type="time" name="donateTime" value="<?= $donateTime ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Location*</td>
                    <td>:</td>
                    <td>
                        <textarea rows="4" name="location" cols="20" required><?= $location ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Remark</td>
                    <td>:</td>
                    <td>
                        <textarea rows="4" name="remark" cols="20"><?= $remark ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="3" align="right">
                        <input type="submit" value="Submit" name="B1">
                        <input type="reset" value="Reset" name="B2" onclick="resetForm()">
                        <input type="button" value="Clear" name="B3" onclick="clearForm()">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <p></p>
 <?php
    echo '<footer>
	<div class="footers">
    	<div>
        <div><b>Connect</b></div>
        <div><a href="#"><i class="fa-brands fa-instagram"></i> Instagram</a></div>
        <div><a href="#"><i class="fa-brands fa-facebook"></i> Facebook</a></div>
        <div><a href="#"><i class="fa-brands fa-tiktok"></i> Tiktok</a></div>
        <div><a href="#"><i class="fa-brands fa-youtube"></i> Youtube</a></div>
    </div>
    <div>
        <div><b>Resources</b></div>
        <div><a href="#">Privacy Policy</a></div>
        <div><a href="#">FAQs</a></div>
    </div>
    <div>
        <div><b>About Us</b></div>
        <div><a href="#">Contain Story</a></div>
        <div><a href="#">Hotline</a></div>
        <div><a href="#">Contact</a></div>
        <div><a href="#">Careers</a></div>
    </div>
</div>
</footer>';
    ?>

    <script>
        //for responsive sandwich menu
        function myFunction() {
            var x = document.getElementById("nav");
            if (x.className === "nav") {
                x.className += " responsive";
            } else {
                x.className = "nav";
            }
        }
        //reset form after modification to a php echo to fields
        function resetForm() {
            document.getElementById("myForm").reset();
        }
        //this clear form to empty the form for new data
        function clearForm() {
            var form = document.getElementById("myForm");
            if (form) {
                var inputs = form.getElementsByTagName("input");
                var textareas = form.getElementsByTagName("textarea");
                //clear select
                form.getElementsByTagName("select")[0].selectedIndex = 0;

                //clear all inputs
                for (var i = 0; i < inputs.length; i++) {
                    if (inputs[i].type !== "button" && inputs[i].type !== "submit" &&
                        inputs[i].type !== "reset") {
                        inputs[i].value = "";
                    }
                }
                //clear all textareas
                for (var i = 0; i < textareas.length; i++) {
                    textareas[i].value = "";
                }
            } else {
                console.error("Form not found");
            }
        }
    </script>
</body>

</html>
