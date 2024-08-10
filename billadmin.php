<?php
session_start();

// Check if session variable 'tc_data' exists and contains data
if (isset($_SESSION['tc_data'])) {
    $tc_data = $_SESSION['tc_data'];
} else {
    // Redirect to the form page if session data is not available
    header("Location: index.html"); // Adjust the actual page name
    exit();
}
function formatDate($date) {
    return date('d-m-Y', strtotime($date));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Page</title>
    <link rel="stylesheet" href="bill.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
</head>
<body>
    <div class="fullprint" id="fullp">
        <header>
            <div class="logo1"><img src="panther-new-logo.png"></div>
            <div class="title1">
                <h1>JINDAL STEEL AND POWER LTD.</h1>
                <h4>Balkudra, Patratu</h4>
                <h4>District : Ramgarh , Jharkhand 829143, INDIA</h4>
                <h4>Tel : +916553 275724/275726</h4>
                <h4>Fax : +91 6553 275744</h4>
            </div>
            <div class="isi"><img src="isi-removebg-preview.png">
        </div>
        </header>
        <hr>
        <main>
            <h2>TEST CERTIFICATE FOR HIGH STRENGTH DEFORMED STEEL BARS WIRES FOR CONCRETE REINFORCEMENT</h2>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="fields1">
                <div class="a1">
                    <div>
                        <label class="mylab">TC NO. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" class="myfield" readonly name="tc_no" value="<?php echo $tc_data['TC_NO']; ?>" ><br>
                        <label class="mylab">TC DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" class="myfield" name='tc_date' value="<?php echo formatDate($tc_data['TC_DATE']); ?>" ><br>
                        <label class="mylab">PROCESS ROUTE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" class="myfield" name='process_route' value="<?php echo $tc_data['PROCESS_ROUTE']; ?>" ><br>
                        <label class="mylab">DE-OXIDATION PRACTICE :</label>
                        <input type="text" class="myfield" name="de_oxidation" value="<?php echo $tc_data['DE_OXIDATION']; ?>" ><br>
</div>
                </div>
                <div class="a2">
                    <div>
                        <label class="mylab">DELIVERY NO. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" class="myfield" name='delver_no' value="<?php echo $tc_data['DELVER_NO']; ?>" ><br>
                        <label class="mylab">PURCHASE ORDER NO. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" class="myfield" name="purchase_ord_no" value="<?php echo $tc_data['PURCHASE_ORD_NO']; ?>" ><br>
                        <label class="mylab">CUSTOMER NO. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" class="myfield" name='customer_name' value="<?php echo $tc_data['CUSTOMER_NAME']; ?>" ><br>
                        <label class="mylab">SUPPLY CONDITION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" class="myfield" name='supply_cond' value="<?php echo $tc_data['SUPPLY_COND']; ?>" ><br>
</div>
                </div>
            </div>
            <div class="mytext">
                We certify that the materials described below conform to the chemical composition and mechanical properties of the product as tested in accordance with the scheme of testing and inspection obtained in the ISI Certification marks License No CM/L 5550868 are indicated against each other (Please refer to IS 1786:2008 for details of specification requirement).
            </div>
            <br>
            <label class="mylab" style="font-size: large;">Materials :</label>
            <input type="text" class="myfield4" name='material_1' value="<?php echo $tc_data['MATERIAL_1']; ?>" >&nbsp;&nbsp;&nbsp;<input type="text" class="myfield4" name='material_2' value="<?php echo $tc_data['MATERIAL_2']; ?>" ><br><br>
            <table>
                <tr>
                    <th rowspan="2" id="heat">HEAT NO.</th>
                    <th rowspan="2">BUNDLE (MT)</th>
                    <th colspan="4" id="chem">CHEMICAL PROPERTIES</th>
                    <th colspan="7">MECHANICAL PROPERTIES</th>
                </tr>
                <tr>
                    <th>%C</th>
                    <th>%P</th>
                    <th>%S</th>
                    <th>%CE</th>
                    <th>Wt/M (Kg/Mtr)</th>
                    <th>Proof Stress (N/mm2)</th>
                    <th>Tensile Strength (N/mm2)</th>
                    <th>%Elongation</th>
                    <th>Total Elongation at Max Load</th>
                    <th>Bend</th>
                    <th>Rebend</th>
                </tr>
                <tr>
                    <td><input type="text" id="heatno"  class="mybox" name='heatno' value="<?php echo $tc_data['HEATNO']; ?>"></td>
                    <td><input type="text" id="bundle"  class="mybox" name='bundle' value="<?php echo $tc_data['BUNDLE']; ?>"></td>
                    <td><input type="text" id="%C"  class="mybox" name='carbon' value="<?php echo $tc_data['CARBON']; ?>"></td>
                    <td><input type="text" id="%P"  class="mybox" name='phosphorus' value="<?php echo $tc_data['PHOSPHORUS']; ?>"></td>
                    <td><input type="text" id="%S"  class="mybox" name='sulphur' value="<?php echo $tc_data['SULPHER']; ?>"></td>
                    <td><input type="text" id="%CE"  class="mybox" name='ce' value="<?php echo $tc_data['CE']; ?>"></td>
                    <td><input type="text" id="Wt"  class="mybox" name='wt' value="<?php echo $tc_data['WTMKGMTR']; ?>"></td>
                    <td><input type="text" id="proof"  class="mybox" name='proof_stress' value="<?php echo $tc_data['PROOF_STRESS']; ?>"></td>
                    <td><input type="text" id="tensile"  class="mybox" name='tensile_strength' value="<?php echo $tc_data['TENSILE_STRENGTH']; ?>"></td>
                    <td><input type="text" id="elong"  class="mybox"  name='elongation' value="<?php echo $tc_data['ELONGATION']; ?>"></td>
                    <td><input type="text" id="totelong"  class="mybox"  name='t_elongation' value="<?php echo $tc_data['T_ELONGATION']; ?>"></td>
                    <td><input type="text" id="bend"  class="mybox" name='bend' value="<?php echo $tc_data['BEND']; ?>"></td>
                    <td><input type="text" id="rebend"  class="mybox" name='rebend' value="<?php echo $tc_data['REBEND']; ?>"></td>
                </tr>
            </table><br>
            <div class="bot">
                <div class="left1">
                    <label class="mylab">Remarks :</label>
                    <input type="text" class="myfield2" id="remarks" name="remark" value="<?php echo $tc_data['REMARK']; ?>"><br><br>
                    <label class="mylab3">Dispatch Advice No. &nbsp;&nbsp;&nbsp;&nbsp;:</label>
                    <input type="text" class="myfield3" id="dispno" name='dispatch_advice_no' value="<?php echo $tc_data['DISPATCH_ADVICE_NO']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="mylab">Prepared By &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                    <input type="text" class="myfield" id="prepby"  name="prepared_by" value="<?php echo $tc_data['PREPARED_BY']; ?>"><br><br>
                    <label class="mylab3">Truck/Wagon Number :</label>
                    <input type="text" class="myfield3" id="truckno" name="truck_no" value="<?php echo $tc_data['TRUCK_NO']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="mylab">Preparation Date :</label>
                    <input type="text" class="myfield" id="prepdate" name="preparation_date" value="<?php echo formatDate($tc_data['PREPARATION_DATE']); ?>">
                </div>
                <div class="right1">
                    <img src="sign.jpg" alt="Signature" class="myimg">
                    <p>Authorized Signature (Quality for Jindal Steel and Power)</p>
                </div>
            </div>
        </main>
    </div>
    
    <button type="submit" name="update_data">Update Data</button>
    </form>
    <button onclick="generateAndSendPDF()">Generate and Send PDF</button>



    <script>
        function generateAndSendPDF() {
            const element = document.getElementById('fullp');

            html2canvas(element, {
                scale: 0.7,  // Adjust scale to improve quality if needed
                scrollY: -window.scrollY,
                logging: true,
                windowWidth: element.scrollWidth,
                windowHeight: element.scrollHeight
            }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('landscape');
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save('document.pdf');

                // Example of sending PDF via email
                fetch('http://localhost/jindal/send-pdf-email.php', {
                    method: 'POST',
                    body: pdf.output('blob')
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to send PDF via email');
                    }
                    alert('PDF sent successfully!');
                }).catch(error => {
                    console.error('Error sending PDF via email:', error);
                    alert('Failed to send PDF via email');
                });
            });
        }
    </script>
</body>
</html>

<?php
// Handle form submission for updating data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_data'])) {
    // Retrieve updated values from the form
    $tc_no = $_POST['tc_no'];
    $tc_date = $_POST['tc_date'];
    $process_route = $_POST['process_route'];
    $de_oxidation = $_POST['de_oxidation'];
    $delver_no = $_POST['delver_no'];
    $purchase_ord_no = $_POST['purchase_ord_no'];
    $customer_name = $_POST['customer_name'];
    $supply_cond = $_POST['supply_cond'];
    $material_1 = $_POST['material_1'];
    $material_2 = $_POST['material_2'];
    $heatno = $_POST['heatno'];
    $bundle = $_POST['bundle'];
    $carbon = $_POST['carbon'];
    $phosphorus = $_POST['phosphorus'];
    $sulphur = $_POST['sulphur'];
    $ce = $_POST['ce'];
    $wt = $_POST['wt'];
    $proof_stress = $_POST['proof_stress'];
    $tensile_strength = $_POST['tensile_strength'];
    $elongation = $_POST['elongation'];
    $t_elongation = $_POST['t_elongation'];
    $bend = $_POST['bend'];
    $rebend = $_POST['rebend'];
    $remark = $_POST['remark'];
    $dispatch_advice_no = $_POST['dispatch_advice_no'];
    $prepared_by = $_POST['prepared_by'];
    $truck_no = $_POST['truck_no'];
    $preparation_date = $_POST['preparation_date'];

    // Update database with the new values
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'jspl';

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize inputs to prevent SQL injection
    $tc_no = mysqli_real_escape_string($conn, $tc_no);
    $tc_date = mysqli_real_escape_string($conn, $tc_date);
    $process_route = mysqli_real_escape_string($conn, $process_route);
    $de_oxidation = mysqli_real_escape_string($conn, $de_oxidation);
    $delver_no = mysqli_real_escape_string($conn, $delver_no);
    $purchase_ord_no = mysqli_real_escape_string($conn, $purchase_ord_no);
    $customer_name = mysqli_real_escape_string($conn, $customer_name);
    $supply_cond = mysqli_real_escape_string($conn, $supply_cond);
    $material_1 = mysqli_real_escape_string($conn, $material_1);
    $material_2 = mysqli_real_escape_string($conn, $material_2);
    $heatno = mysqli_real_escape_string($conn, $heatno);
    $bundle = mysqli_real_escape_string($conn, $bundle);
    $carbon = mysqli_real_escape_string($conn, $carbon);
    $phosphorus = mysqli_real_escape_string($conn, $phosphorus);
    $sulphur = mysqli_real_escape_string($conn, $sulphur);
    $ce = mysqli_real_escape_string($conn, $ce);
    $wt = mysqli_real_escape_string($conn, $wt);
    $proof_stress = mysqli_real_escape_string($conn, $proof_stress);
    $tensile_strength = mysqli_real_escape_string($conn, $tensile_strength);
    $elongation = mysqli_real_escape_string($conn, $elongation);
    $t_elongation = mysqli_real_escape_string($conn, $t_elongation);
    $bend = mysqli_real_escape_string($conn, $bend);
    $rebend = mysqli_real_escape_string($conn, $rebend);
    $remark = mysqli_real_escape_string($conn, $remark);
    $dispatch_advice_no = mysqli_real_escape_string($conn, $dispatch_advice_no);
    $prepared_by = mysqli_real_escape_string($conn, $prepared_by);
    $truck_no = mysqli_real_escape_string($conn, $truck_no);
    $preparation_date = mysqli_real_escape_string($conn, $preparation_date);

    $query = "UPDATE emp1 SET 
              TC_DATE='$tc_date', 
              PROCESS_ROUTE='$process_route', 
              DE_OXIDATION='$de_oxidation', 
              DELVER_NO='$delver_no', 
              PURCHASE_ORD_NO='$purchase_ord_no', 
              CUSTOMER_NAME='$customer_name', 
              SUPPLY_COND='$supply_cond', 
              MATERIAL_1='$material_1', 
              MATERIAL_2='$material_2', 
              HEATNO='$heatno', 
              BUNDLE='$bundle', 
              CARBON='$carbon', 
              PHOSPHORUS='$phosphorus', 
              SULPHER='$sulphur', 
              CE='$ce', 
              WTMKGMTR='$wt', 
              PROOF_STRESS='$proof_stress', 
              TENSILE_STRENGTH='$tensile_strength', 
              ELONGATION='$elongation', 
              T_ELONGATION='$t_elongation', 
              BEND='$bend', 
              REBEND='$rebend', 
              REMARK='$remark', 
              DISPATCH_ADVICE_NO='$dispatch_advice_no', 
              PREPARED_BY='$prepared_by', 
              TRUCK_NO='$truck_no', 
              PREPARATION_DATE='$preparation_date'
              WHERE TC_NO='$tc_no'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data updated successfully");</script>';
        echo '<script>window.location.href="adminpage.php";</script>';
        
        exit();
    } else {
        echo '<script>alert("Failed to update data: ' . mysqli_error($conn) . '");</script>';
    }
    
    mysqli_close($conn);
}
?>