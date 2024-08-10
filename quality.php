<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jspl';
$conn = mysqli_connect($host, $username, $password, $database);



if (isset($_POST['SAVE'])) {

    $tc_no = $_POST['tc_no'];
    $tc_date = $_POST['tc_date'];
    $tc_proccess = $_POST['tc_proccess'];
    $tc_oxi = $_POST['tc_oxi'];
    $tc_supply = $_POST['tc_supply'];
    $tc_material = $_POST['tc_material'];
    $tc_material2 = $_POST['tc_material2'];
    $tc_heat = $_POST['tc_heat'];
    $tc_c = $_POST['tc_c'];
    $tc_p = $_POST['tc_p'];
    $tc_s = $_POST['tc_s'];
    $tc_ce = $_POST['tc_ce'];
    $tc_wt = $_POST['tc_wt'];
    $tc_ps = $_POST['tc_ps'];
    $tc_n = $_POST['tc_n'];
    $tc_elong = $_POST['tc_elong'];
    $tc_total = $_POST['tc_total'];
    $tc_bend = $_POST['tc_bend'];
    $tc_rebend = $_POST['tc_rebend'];
    $tc_remark = $_POST['tc_remark'];
    $tc_preparedby = $_POST['tc_preparedby'];
    $tc_prepare = $_POST['tc_prepare'];


    $qw = "INSERT INTO emp1 
       SET TC_DATE='$tc_date', 
           PROCESS_ROUTE='$tc_proccess', 
           DE_OXIDATION='$tc_oxi', 
           SUPPLY_COND='$tc_supply', 
           MATERIAL_1='$tc_material', 
           MATERIAL_2='$tc_material2', 
           HEATNO='$tc_heat', 
           CARBON='$tc_c', 
           PHOSPHORUS='$tc_p', 
           SULPHER='$tc_s', 
           CE='$tc_ce', 
           WTMKGMTR='$tc_wt', 
           PROOF_STRESS='$tc_ps', 
           TENSILE_STRENGTH='$tc_n', 
           ELONGATION='$tc_elong', 
           T_ELONGATION='$tc_total', 
           BEND='$tc_bend', 
           REBEND='$tc_rebend', 
           REMARK='$tc_remark', 
           PREPARED_BY='$tc_preparedby', 
           PREPARATION_DATE='$tc_prepare'"; 

   
$querry = mysqli_query($conn,$qw);
    if ($querry) {
        echo '<script>alert("DATA INSERT SUCCESSFULL"); window.location="quality.php" </script>';
    } else {
        echo '<script>alert("Invalid Login Credentials"); window.location="login.php" </script>';
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
    <link rel="stylesheet" href="quality.css">
    

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
    <?php
    $tcno = mysqli_query($conn,"SELECT TC_NO FROM emp1 ORDER BY TC_NO DESC LIMIT 1");
    $tc_no = mysqli_fetch_assoc($tcno);
    $tcno=$tc_no['TC_NO']+1;
    ?>
    <main class="mainsec">
        <h1 class="head1">TEST CERTIFICATE FOR HIGH STRENGTH DEFORMED STEEL BARS WIRES<br> FOR <br>CONCRETE REINFORCEMENT</h1>
        <div id="myform1"><br>
            <form class="login" method="post" action="quality.php">
                <fieldset>
                    <legend class="hed1">QUALITY</legend>
                    <br>
                    <div><label class="lab ab">TC NO. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input type="number" value="<?= $tcno; ?>"for="tcno" name="tc_no" class="fields ab" required><br>
                        <label class="lab ab">TC DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input required type="date" for="tcndate" name="tc_date" class="fields ab"><br>
                        <label class="lab ab">PROCESS ROUTE &nbsp;&nbsp;&nbsp;&nbsp;:</label><input required type="text" for="processroute" name="tc_proccess" class="fields ab"><br>
                        <label class="lab ab">De-Oxidation Practice :</label><input required type="text" for="deoxidation" name="tc_oxi" class="fields ab"><br>
                        <label class="lab ab">Supply Condition &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input required type="text" name="tc_supply" for="supplycondition" class="fields ab"><br>
                        <label class="lab ab">Material &nbsp;&nbsp;:
                        
                        </label><select required name="tc_material" class="fields2 ab clas" >
                           
                        <option >CUT AND BEND</option>
                            <option>WELD MESH</option>
                        </select>&nbsp;&nbsp;<input required type="text" id="material2" name="tc_material2" class="fields2 ab clas"><BR>
                        <label class="lab ab">Heat No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label><input required type="text" for="heatno" name="tc_heat" class="fields ab"><br>
                        <br><br><br><br><br>
                        <div class="me1">
                            <div class="properties1">
                                <h2>CHEMICAL PROPERTIES</h2><br><br>
                                <label class="lab ab">%C :</label><input required type="number" id="C" name="tc_c" class="fields3 ab" min=0 max=1 step=.001><br>
                                <label class="lab ab">%P :</label><input required type="number" id="P" name="tc_p" class="fields3 ab" min=0.0 max=1.0 step=.001><br>
                                <label class="lab ab">%S :</label><input required type="number" id="S" name="tc_s" class="fields3 ab" min=0.0 max=1.0 step=.001><br>
                                <label class="lab ab">CE :</label><input required type="number" id="CE" name="tc_ce" class="fields3 ab" min=0.0 max=1.0 step=.001><br>
                            </div>
                            <div class="properties1">
                                <h2>MECHANICAL PROPERTIES</h2><br><br>&nbsp;&nbsp;
                                <label class="lab ab">Wt/m (Kg/mtr) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input required type="number" min=0 max=100 step=0.001 for="Wt/m" name="tc_wt" class="fields3 ab"><br>
                                <label class="lab ab">Proof Stress (N/mm2) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input required type="number" for="PS" name="tc_ps" class="fields3 ab"><br>
                                <label class="lab ab">Tensile Strength (N/mm2):</label><input required type="number" for="TS" name="tc_n" class="fields3 ab"><br>
                                <label class="lab ab">%Elongation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input required type="number" for="Elongation" name="tc_elong" class="fields3 ab" min=0 max=40 step=0.01><br>
                                <label class="lab ab">Total Elong. at Max Load :</label><input required type="number" for="TotalE" name="tc_total" class="fields3 ab"><br>
                                <label class="lab ab">Bend &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input required type="text" for="Bend" name="tc_bend" class="fields3 ab"><br>
                                <label class="lab ab">Rebend &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label><input required type="text" for="Rebend" name="tc_rebend" class="fields3 ab"><br>
                            </div>
                        </div><br><br><br><br><br>
                        <label class="lab ab">Remarks :</label><input type="text" for="remarks" name="tc_remark" class="fields4 ab"><br><br>
                        <label class="lab ab clas3">Prepared By &nbsp;&nbsp;&nbsp;:</label><input required type="text" for="preparedby" name="tc_preparedby" class="fields2 ab clas2">
                        <label class="lab ab clas2 clas3">
                            Preperation Date :</label><input required type="date" for="date1" name="tc_prepare" class="fields2 ab"><br><br><br><br>
                        <input type="submit" class="btna" name="SAVE" value="SAVE">&nbsp;&nbsp;&nbsp;&nbsp;<button class="btna" name="view_tc" onclick="FUNC1()">PREVIEW</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="btna" name="exit" name="exit" onclick="FUNC2()">EXIT</button><br><br><br>
                </fieldset>
            </form>
        </div>
        </div>

        <hr>
        <footer>
            <div class="logo2"><img src="images.png"></div>
            <div class="contact">
            &nbsp;&nbsp;&nbsp;&nbsp;<h3>Contact us:</h3><br><br><br>Tel : +916553 275724/275726<br><br>Fax : +91 6553275744<br><br>
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

