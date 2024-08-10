
<?php
if (isset($_POST['exit'])) {
    header("Location: login.php");
    exit();
}

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jspl';
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit1'])) {
    $username1 = $_POST['username1'];
    $password1 = $_POST['password1'];
    $usertype = $_POST['usertype_qual'];

    if ($usertype == 'quality') { // Corrected to match the form value
        $username1 = mysqli_real_escape_string($conn, $username1);
        $password1 = mysqli_real_escape_string($conn, $password1);

        $query = "UPDATE user_mang SET username='$username1', password='$password1' WHERE user_type='quality'";

        if (mysqli_query($conn, $query)) {
            echo '<script>alert("Username and Password updated successfully"); window.location="adminpage.php" </script>';
        } else {
            echo '<script>alert("Failed to update Username and Password"); window.location="adminpage.php" </script>';
        }
    } else {
        echo '<script>alert("You do not have permission to update Username and Password for RSC"); window.location="adminpage.php" </script>';
    }
}


if (isset($_POST['submit2'])) {
    $username2 = $_POST['username2'];
    $password2 = $_POST['password2'];
    $usertype = $_POST['usertype_rsc'];

    if ($usertype == 'rsc') { // Corrected to match the form value
        $username2 = mysqli_real_escape_string($conn, $username2);
        $password2 = mysqli_real_escape_string($conn, $password2);

        $query = "UPDATE user_mang SET username='$username2', password='$password2' WHERE user_type='rsc'";

        if (mysqli_query($conn, $query)) {
            echo '<script>alert("Username and Password updated successfully"); window.location="adminpage.php" </script>';
        } else {
            echo '<script>alert("Failed to update Username and Password"); window.location="adminpage.php" </script>';
        }
    } else {
        echo '<script>alert("You do not have permission to update Username and Password for RSC"); window.location="adminpage.php" </script>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header class="top">                                        <!--This is the heading section-->
     <div class="topleft"><a href="https://www.jindalsteelpower.com/jharkhand.html" target="_blank"><image src="polygon-31.png" class="logo"></a></image></div>  <!--This is the company Logo-->
     <div class="compname"><h1>JINDAL STEEL AND POWER LTD.</h1><br><h3>Balkudra,Patratu</h3><h3>District - Ramgarh</h3><h3>Jharkhand - 829143, INDIA</h3></div>  <!--This is the company Name andf address-->
     <div class="isi"><img src="isi.jpg">
     </div>
    </header>
    <hr>
    <main class="mainsec">
        <h1 class="heading" style="color:black;">ADMINS' PORTAL</h1>
        <div id="myform1">
            <form class="login" method="POST">
            <fieldset>
                <br>
                <h2 class="myhead">EDIT QUALITY USERNAME AND PASSWORD</h2>
                <label class="lab ab" for="username1">Username :</label><input type="Username"  placeholder="Enter your Username" id="username1" name="username1" class="fields me ab"><br><br>
                <label class="lab" for="password1">Password :</label><input type="password" placeholder="Enter your Password" id="password1" name="password1" class="me fields"><br><br>
                <input type="hidden" name="usertype_qual" value="quality">
                <input type="submit" class="sub1" name="submit1" id="sumbit1"><br><br><hr><br><br>
                <h2 class="myhead">EDIT RSC USERNAME AND PASSWORD</h2>
                <label class="lab ab" for="username2">Username :</label><input type="Username"  placeholder="Enter your Username" id="username2" name="username2" class="fields me ab"><br><br>
                <label class="lab" for="password2">Password :</label><input type="password" placeholder="Enter your Password" id="password2" name="password2" class="me fields"><br><br>
                <input type="hidden" name="usertype_rsc" value="rsc">
                <input type="submit" class="sub1" name="submit2" id="sumbit2"><br><br><hr><br><br>
                <label class="lab ab">EDIT AUTHORITY SIGNATURE : </label><input type="file" name="authority_signature" id="authority_signature">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="sub1" ><br><br><br><hr><br><br>
                <label class="lab ab" for="tcno">EDIT TC :</label>
            <input type="text" placeholder="Enter TC No. Here" id="tcno" name="tcno" class="fields ab">
            <button type="submit" class="sub" name="tc_edit" onclick="setFormAction('fetch_data2.php')">Submit</button><br><br><br>
        <hr><br><br><br><br>
                <button onclick="" class="btn1" name="exit" id="exit">Exit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
                
            </fieldset>
        </form>
    </div>
    
  <hr>
    <footer>
        <div class="logo2"><img src="images.png"></div>
        <div class="contact"><h3>Contact us:</h3><br><br><br>Tel : +916553 275724/275726<br><br>Fax : +91 6553275744<br><br></div>
    </footer>
    </main>
</body>
<script>
function setFormAction(action) {
    document.querySelector('.login').action = action;
}
</script>

</html>
