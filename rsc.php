<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="rsc.css">

</head>

<body>
    <header class="top"> <!--This is the heading section-->
        <div class="topleft"><a href="https://www.jindalsteelpower.com/jharkhand.html" target="_blank">
                <image src="polygon-31.png" class="logo">
            </a></image>
        </div> <!--This is the company Logo-->
        <div class="compname">
            <h1>JINDAL STEEL AND POWER LTD.</h1><br>
            <h3>Balkudra,Patratu</h3>
            <h3>District - Ramgarh</h3>
            <h3>Jharkhand - 829143, INDIA</h3>
        </div> <!--This is the company Name andf address-->
        <div class="isi"><img src="isi.jpg">
        </div>
    </header>
    <hr>

    <main class="mainsec">
        <h1 class="head1">TEST CERTIFICATE FOR HIGH STRENGTH DEFORMED STEEL BARS WIRES<br> FOR <br>CONCRETE REINFORCEMENT</h1>
       <br><br>
        <div id="myform2">
            <form class="login2"  method="POST">
                <fieldset>
                    <legend class="hed1">RSC</legend>
                    <br>
                    <label class="lab ab">TC NO. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input required type="number" for="tcno" name="tc_no" class="fields ab"><br>
                    <label class="lab ab">Bundle(MT) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input required type="text" for="bundle" name="tc_bundle" class="fields ab" min=0 max=99 step=0.001><br>
                    <label class="lab ab">Delivery No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input required type="number" id="Deliveryno" name="rsc_delivery" class="fields ab"><br>
                    <label class="lab ab">Purchase Order No.&nbsp;&nbsp; :</label><input required type="text" id="POno" name="rsc_po" class="fields ab"><br>
                    <label class="lab ab">Customer Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input required type="text" id="Custno" name="rsc_custno" class="fields ab"><br>
                    <label class="lab ab">Dispatch Advice No. :</label><input required type="number" id="disadvno" name="rsc_dispno" class="fields ab"><br>
                    <label class="lab ab">Truck/Wagon No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label><input required type="text" id="truckno" name="rsc_truck" class="fields ab"><br><br><br><br>
                    <input type=submit class="btna" id="rsc_submit"  value="SAVE" name="rsc_submit">&nbsp;&nbsp;&nbsp;&nbsp;<button class="btna" name="view_tc" onclick="FUNC1()">PREVIEW</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="btna" id="exit" name="exit" onclick="FUNC2()">EXIT</button><br><br><br>

                </fieldset>
            </form>
        </div>
        </div>

        <hr>
        <footer>
            <div class="logo2"><img src="images.png"></div>
            <div class="contact">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h3>Contact us:</h3><br><br><br>Tel : +916553 275724/275726<br><br>Fax : +91 6553275744<br><br>
            </div>
        </footer>
    </main>
</body>
<script>
     function FUNC1() {
            // Redirect to the desired PHP page
            window.location.href = 'viewtc.php';
        }
function FUNC2() {
            // Redirect to the desired PHP page
            window.location.href = 'login.php';
        }

</script>
</html>

<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jspl';
$conn = mysqli_connect($host, $username, $password, $database);

if (isset($_POST['rsc_submit'])) {
    $tc_no = $_POST['tc_no'];
    $tc_bundle = $_POST['tc_bundle'];
    $rsc_delivery = $_POST['rsc_delivery'];
    $rsc_po = $_POST['rsc_po'];
    $rsc_custno = $_POST['rsc_custno'];
    $rsc_dispno = $_POST['rsc_dispno'];
    $rsc_truck = $_POST['rsc_truck'];

    // Check if TC number already exists in emp1
    $check_query = "SELECT * FROM emp1 WHERE TC_NO = '$tc_no'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // TC number exists, update the existing row in emp1
        $update_query = "UPDATE emp1 SET 
                            BUNDLE='$tc_bundle', 
                            DELVER_NO='$rsc_delivery', 
                            PURCHASE_ORD_NO='$rsc_po', 
                            CUSTOMER_NAME='$rsc_custno', 
                            DISPATCH_ADVICE_NO='$rsc_dispno', 
                            TRUCK_NO='$rsc_truck' 
                        WHERE TC_NO='$tc_no'";
        
        $update_result = mysqli_query($conn, $update_query);
        
        if ($update_result) {
            echo '<script>alert("DATA UPDATED SUCCESSFULLY"); window.location="rsc.php" </script>';
        } else {
            echo '<script>alert("Error updating emp1"); window.location="rsc.php" </script>';
        }
    } else {
        // TC number does not exist in emp1
        echo '<script>alert("TC No. does not exist in emp1"); window.location="rsc.php" </script>';
    }
}

?>
