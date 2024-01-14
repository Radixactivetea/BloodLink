<!DOCTYPE html>
<html lang="en">

<head>
    <title>BloodLink</title>
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 700px;
            background-color: #0868a9;
        }

        .box {
            background-color: #ebeff4;
            text-align: center;
            font-family: inherit;
            padding: 20px;
            border-radius: 6px;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
            font-size: 17px;
            color: #4A4A4A;
            margin-bottom: 20px;
        }

        .box button {
            padding: 8px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 8px;
        }

        .option {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 150px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    // Check if the user is not logged in, redirect to login page
    if (!isset($_SESSION["UID"])) {
        header("location:../index.php");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // If the form is submitted, unset session variables
        unset($_SESSION["UID"]);

        // Redirect to the index page
        header("location:../index.php");
        exit();
    }
    ?>

    <div class="box">
        <label>Are Sure You Want To Log Out?</label>
        <div class="option">
            <form action="" method="post">
                <button style="background-color: green;" type="submit">Yes</button>
            </form>
            <a href="others/home.php"><button style="background-color: red;">No</button></a>
        </div>
    </div>
</body>

</html>