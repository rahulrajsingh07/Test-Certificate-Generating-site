<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="viewtc.css">
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
    <div class="buttons"></div>
    <div>
    <div id="myform1">
        <form class="login" method="POST" action="fetch_data.php">
        <fieldset>
            <legend class=hed1>&nbsp;VIEW TC&nbsp;</legend><br><br><br>
            <label class="lab" for="tcno" >ENTER TC NO. : &nbsp;&nbsp;&nbsp;&nbsp;</label><input type="number" placeholder="Enter TC No." name="tcno" id="tcno" class="fields"><br><br><br><br>
            <input type="submit" name="tc_view" class="sub"><button class="sub">Back</button>
        </fieldset>
    </form>
</div>



</div>
<div>

    </main>
    <hr>
    <footer>
        <div class="logo2"><img src="images.png"></div>
        <div class="contact"><h3>Contact us:</h3><br><br><br>Tel : +916553 275724/275726<br><br>Fax : +91 6553275744<br><br></div>
    </footer>

 
</body>
</html>

<?php
session_start(); // Start the session
?>