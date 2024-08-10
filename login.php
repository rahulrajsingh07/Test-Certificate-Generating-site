<?php
// Suppress error reporting (not recommended in production)
error_reporting(0);

// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jspl';

// Connect to MySQL database
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Start session to manage user session
session_start();

// Handle user login form submission
if (isset($_POST['user_login'])) {
    $user = $_POST['username1'];
    $pass = $_POST['password1'];
    $login_type = 'quality';

    // SQL query to fetch user with specified credentials
    $query = "SELECT * FROM user_mang WHERE username='$user' AND password='$pass' AND user_type='$login_type'";
    $result = mysqli_query($conn, $query);

    // If user found, set session and redirect to quality page
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $user; // Store username in session
        header("Location: quality.php"); // Redirect to user page
        exit;
    } else {
        // Display error message and redirect to login page
        echo '<script>alert("Invalid User Login Credentials"); window.location="login.php";</script>';
    }
} elseif (isset($_POST['admin_login'])) {
    // Handle admin login form submission
    $user = $_POST['username2'];
    $pass = $_POST['password2'];
    $login_type = 'admin';

    // SQL query to fetch admin with specified credentials
    $query = "SELECT * FROM user_mang WHERE username='$user' AND password='$pass' AND user_type='$login_type'";
    $result = mysqli_query($conn, $query);

    // If admin found, set session and redirect to admin page
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $user; // Store username in session
        header("Location: adminpage.php"); // Redirect to admin page
        exit;
    } else {
        // Display error message and redirect to login page
        echo '<script>alert("Invalid Admin Login Credentials"); window.location="login.php";</script>';
    }
} elseif (isset($_POST['rsc_login'])) {
    // Handle RSC login form submission
    $user = $_POST['username3'];
    $pass = $_POST['password3'];
    $login_type = 'rsc';

    // SQL query to fetch RSC user with specified credentials
    $query = "SELECT * FROM user_mang WHERE username='$user' AND password='$pass' AND user_type='$login_type'";
    $result = mysqli_query($conn, $query);

    // If RSC user found, set session and redirect to RSC page
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $user; // Store username in session
        header("Location: rsc.php"); // Redirect to RSC page
        exit;
    } else {
        // Display error message and redirect to login page
        echo '<script>alert("Invalid RSC Login Credentials"); window.location="login.php";</script>';
    }
}

// Close MySQL connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="loginpage.css">
</head>
<body>
    <!-- Header section -->
    <header class="top">
        <!-- Company Logo -->
        <div class="topleft">
            <a href="https://www.jindalsteelpower.com/jharkhand.html" target="_blank">
                <img src="polygon-31.png" class="logo">
            </a>
        </div>
        <!-- Company Name and Address -->
        <div class="compname">
            <h1>JINDAL STEEL AND POWER LTD.</h1>
            <br>
            <h3>Balkudra, Patratu</h3>
            <h3>District - Ramgarh</h3>
            <h3>Jharkhand - 829143, INDIA</h3>
        </div>
        <div class="isi"><img src="isi.jpg">
        </div>
    </header>
    <hr>
    <!-- Main section -->
    <main class="mainsec">
        <!-- Buttons for different login interfaces -->
        <div class="buttons">
            <button id="user" onclick="userinterface()"> Quality </button>
            <button id="admin" onclick="admininterface()"> Admin </button>
            <button id="rsc" onclick="rscinterface()"> RSC </button>
        </div>

        <!-- Quality Login Form -->
        <div id="myform1">
            <form class="login" method="POST" onsubmit="validate()">
                <fieldset>
                    <legend class=hed1>Quality Login</legend><br>
                    <label class="lab" for="username">Username :</label>
                    <input type="text" placeholder="Enter your Username" name="username1" id="username1" class="fields"><br><br>
                    <label class="lab" for="password">Password :</label>
                    <input type="password" placeholder="Enter your Password" name="password1" id="password1" class="fields"><br><br>
                    <input type="submit" name="user_login" class="sub">
                </fieldset>
            </form>
        </div>

        <!-- Admin Login Form -->
        <div id="myform2" style="display:none;">
            <form class="login" method="POST" onsubmit="validate()">
                <fieldset>
                    <legend>Admin Login</legend><br>
                    <label class="lab" for="username">Username :</label>
                    <input type="text" placeholder="Enter your Username" name="username2" id="username2" class="fields"><br><br>
                    <label class="lab" for="password">Password :</label>
                    <input type="password" placeholder="Enter your Password" name="password2" id="password2" class="fields"><br><br>
                    <input type="submit" name="admin_login" class="sub">
                </fieldset>
            </form>
        </div>

        <!-- RSC Login Form -->
        <div id="myform3" style="display:none;">
            <form class="login" method="POST" onsubmit="validate()">
                <fieldset>
                    <legend>RSC Login</legend><br>
                    <label class="lab" for="username3">Username :</label>
                    <input type="text" placeholder="Enter your Username" name="username3" id="username3" class="fields"><br><br>
                    <label class="lab" for="password3">Password :</label>
                    <input type="password" placeholder="Enter your Password" name="password3" id="password3" class="fields"><br><br>
                    <input type="submit" name="rsc_login" class="sub">
                </fieldset>
            </form>
        </div>
    </main>
    <hr>
    <!-- Footer section -->
    <footer>
        <div class="logo2">
            <img src="images.png">
        </div>
        <div class="contact">
            <h3>Contact us:</h3><br><br><br>
            Tel : +916553 275724/275726<br><br>
            Fax : +91 6553275744<br><br>
        </div>
    </footer>

    <!-- JavaScript for handling button clicks and form visibility -->
    <script>
        function userinterface() {
            // Show Quality login form, hide others
            document.getElementById("myform1").style.display = "flex";
            document.getElementById("user").style.opacity = "0.5";
            document.getElementById("myform2").style.display = "none";
            document.getElementById("admin").style.opacity = "1";
            document.getElementById("myform3").style.display = "none";
            document.getElementById("rsc").style.opacity = "1";
        }

        function admininterface() {
            // Show Admin login form, hide others
            document.getElementById("myform1").style.display = "none";
            document.getElementById("user").style.opacity = "1";
            document.getElementById("myform2").style.display = "flex";
            document.getElementById("admin").style.opacity = "0.5";
            document.getElementById("myform3").style.display = "none";
            document.getElementById("rsc").style.opacity = "1";
        }

        function rscinterface() {
            // Show RSC login form, hide others
            document.getElementById("myform1").style.display = "none";
            document.getElementById("user").style.opacity = "1";
            document.getElementById("myform2").style.display = "none";
            document.getElementById("admin").style.opacity = "1";
            document.getElementById("myform3").style.display = "flex";
            document.getElementById("rsc").style.opacity = "0.5";
        }
    </script>
</body>
</html>
