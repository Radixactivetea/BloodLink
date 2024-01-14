<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav_footer.css">
    <link rel="stylesheet" href="css/register_login.css">
    <script src="https://kit.fontawesome.com/9aa99ba8cc.js" crossorigin="anonymous"></script>
    <title>BloodLink</title>
    <style>
        body {
            color: white;
        }
        img {
            width: 300px;
            border-radius: 10px;
        }

        button {
            background-color: white;
            color: black;
            padding: 15px 40px;
            border-radius: 4px;
            border: none;
        }

        .first {
            padding-left: 100px;
            padding-right: 100px;
        }
    </style>
</head>

<body>
    <nav class="first">
        <div><a href="index.php">BloodLink</a></div>
        <div onclick="showLogin()" style="cursor:pointer;">Log in</div>
    </nav>

    <div id="container">
        <div class="flex">
            <div class="text">
                <h1>Your Community Blood Bank Connection</h1>
                <h4>Be a Lifesaver with Every Drop at Our Blood Bank Portal!</h4>
                <button onclick="showRegister()">Register</button>
            </div>
            <div class="image">
                <img src="img/donation2.png" alt="donation">
            </div>
        </div>
    </div>

    <div class="secontainer">
        <div>
            <div id="signup">
                <form action="user_authentication/signup_action.php" method="post">
                    <label>Sign up</label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <input type="password" name="pswd" placeholder="Password" required>
                    <input type="password" name="confirmpswd" placeholder="Confirm Password" required>
                    <div>
                        <button>Sign up</button>
                        <button onclick="cancel()">Cancel</button>
                    </div>
                </form>
            </div>

            <div id="login">
                <form action="user_authentication/login_action.php" method="post">
                    <label>Login</label>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="pswd" placeholder="Password" required>
                    <div>
                        <button>Log in</button>
                        <button onclick="cancel()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
    define('BASE_URL', '/Bloodbank');
    include('footer.php')
    ?>
</body>
<script>
    function showRegister() {
        var x = document.getElementById("signup");
        x.style.display = 'block';
        var firstField = document.getElementById('email');
        firstField.focus();
        var x = document.getElementById("container");
        x.style.display = 'none';
    }

    function showLogin() {
        var x = document.getElementById("login");
        x.style.display = 'block';
        var firstField = document.getElementById('email');
        firstField.focus();
        var x = document.getElementById("container");
        x.style.display = 'none';
        var x = document.getElementById("signup");
        x.style.display = 'none';
    }

    function cancel() {
        var x = document.getElementById("signup");
        x.style.display = 'none';
        var x = document.getElementById("login");
        x.style.display = 'none';
        var x = document.getElementById("container");
        x.style.display = 'flex';
    }
</script>

</html>