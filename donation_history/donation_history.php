<?php
session_start();
include("../config.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>DONATION HISTORY</title>
    <link rel="stylesheet" href="../css/nav_footer.css">
    <link rel="stylesheet" href="css/nina_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/9aa99ba8cc.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include('../user_nav.php') ?>

    <div class="heading">
        <h1>Donation History</h1>
        <p>DONATE YOUR BLOOD AND INSPIRE OTHERS TO DONATE.</p>
        <img src="img/blood4.png">
        <h2>You a hero! You don't need to be a Doctor to be a Hero, just donate your blood. </h2>
    </div>

    <div style="text-align: right; padding:10px;">
        <form action="donation_history_search.php" method="post">
            <input type="text" placeholder="Search.." name="search">
            <input type="submit" value="Search">
        </form>
    </div>

    <table border="1" width="100%" id="projectable">
        <tr>
            <th width="5%">No</th>
            <th width="10%">Date</th>
            <th width="10%">Time</th>
            <th width="20%">Location</th>
            <th width="20%">Remark</th>
            <th width="10%">Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM donation WHERE userID=" . $_SESSION["UID"];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $numrow = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $numrow . "</td><td>" . $row["donateDate"] . "</td><td>" . $row["donateTime"] . "</td><td>" . $row["location"] .
                    "</td><td>" . $row["remark"] . "</td>";
                echo '<td> <a href="donation_history_edit.php?id=' . $row["donationID"] . '">Edit</a>&nbsp;|&nbsp;';
                echo '<a href="donation_history_delete.php?id=' . $row["donationID"] . '" onClick="return confirm(\'Delete?\');">Delete</a> </td>';
                echo "</tr>" . "\n\t\t";
                $numrow++;
            }
        } else {
            echo '<tr><td colspan="7">0 results</td></tr>';
        }

        mysqli_close($conn);
        ?>

    </table>
    <div style="text-align: right; padding-top:10px;">
        <input type="button" value="Add New" onclick="show_AddEntry()">
    </div>


    <div style="padding:0 10px;" id="historyDiv">
        <h3 align="center">Add Donation History</h3>
        <p align="center">Required field with mark*</p>

        <form method="POST" action="donation_history_action.php" enctype="multipart/form-data" id="myDonationForm">

            <table border="1" id="myTable">
                <tr>
                    <td>Date*</td>
                    <td width="1px">:</td>
                    <td>
                        <input type="date" name="donateDate" required>
                    </td>
                </tr>
                <tr>
                    <td>Time*</td>
                    <td>:</td>
                    <td>
                        <input type="time" name="donateTime" required>
                    </td>
                </tr>
                <tr>
                    <td>Location*</td>
                    <td>:</td>
                    <td>
                        <textarea rows="4" name="location" cols="50" required></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Remark</td>
                    <td>:</td>
                    <td>
                        <textarea rows="4" name="remark" cols="20" required></textarea>
                    </td>
                </tr>

                <tr>
                    <td colspan="3" align="right">
                        <input type="submit" value="Submit" name="B1">
                        <input type="reset" value="Reset" name="B2">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <p></p>

    <?php include('../footer.php')  ?>

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

        function show_AddEntry() {
            console.log("Add New button clicked");
            var x = document.getElementById("historyDiv");
            x.style.display = 'block';
            var firstField = document.getElementsByName('donateDate')[0];
            firstField.focus();
        }
    </script>
</body>

</html>