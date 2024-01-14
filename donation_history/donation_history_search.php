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
    <style>
        #myTable td {
            color: black;
        }

        body {
            color: white;
        }
    </style>
</head>

<body>

    <?php
    $search = "";

    include ('../user_nav.php');

	
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST["search"];
    }
    ?>

    <h2>Search Result:&nbsp;<?= $search ?></h2>

    <div style="padding:0 10px;">
        <div style="text-align: right; padding:10px;">
            <form action="donation_history_search.php" method="post">
                <input type="text" placeholder="Search.." name="search">
                <input type="submit" value="Search">
            </form>
        </div>
        <table border="1" width="100%" id="projectable">
            <tr>
                <th width="5%">No</th>
                <th width="10%"> Date</th>
                <th width="10%">Time</th>
                <th width="30%">Location</th>
                <th width="30%">Remark</th>
                <th width="15%">Action</th>
            </tr>
            <?php
            if ($search != "") {
                $search = $_POST["search"];

                // Split the search string into individual words
                $keywords = explode(" ", $search);

                // Prepare the SQL query with multiple LIKE conditions
                $sql = "SELECT * FROM donation WHERE (";

                // Build the conditions dynamically for single keyword
                $conditions = [];
                foreach ($keywords as $index => $keyword) {
                    $conditions[] = "location LIKE '%$keyword%' OR remark LIKE '%$keyword%'";
                }

                // Combine
                $sql .= implode(" OR ", $conditions);

                // No need to filter by user ID here
                $sql .= ")";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $numrow = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $numrow . "</td><td>" . $row["donateDate"] . "</td><td>" . $row["donateTime"] .
                            "</td><td>" . $row["location"] . "</td><td>" . $row["remark"] . "</td>";
                        echo '<td> <a href="my_challenge_edit.php?id=' . $row["donationID"] . '">Edit</a>&nbsp;|&nbsp;';
                        echo '<a href="my_challenge_delete.php?id=' . $row["donationID"] . '" onClick="return confirm(\'Delete?\');">Delete</a> </td>';
                        echo "</tr>" . "\n\t\t";
                        $numrow++;
                    }
                } else {
                    echo '<tr><td colspan="6">0 results</td></tr>';
                }

                mysqli_close($conn);
            } else {
                echo "Search query is empty<br>";
            }
            ?>
        </table>
        <?php
        // You can include logged in user-specific content here if needed
        ?>
        <div style="text-align: right; padding-top:10px;">
            <input type="button" value="Add New" onclick="show_AddEntry()">
        </div>
    </div>

    <div style="padding:0 10px;" id="historyDiv">
        <h3 align="center">Add Donation</h3>
        <p align="center">Required field with mark*</p>

        <form method="POST" action="donation_history_action.php" enctype="multipart/form-data" id="myForm">
            <table border="1" id="myTable">
                <tr>
                    <td>Donate Date*</td>
                    <td width="1px">:</td>
                    <td>
                        <input type="date" name="donateDate" required>
                    </td>
                </tr>
                <tr>
                    <td>Donate Time*</td>
                    <td>:</td>
                    <td>
                        <input type="time" name="donateTime" required>
                    </td>
                </tr>
                <tr>
                    <td>Location*</td>
                    <td>:</td>
                    <td>
                        <textarea rows="4" name="location" cols="20" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Remark*</td>
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

        function show_AddEntry() {
            var x = document.getElementById("historyDiv");
            x.style.display = 'block';
            var firstField = document.getElementById('date');
            firstField.focus();
        }
    </script>
</body>

</html>
