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
            <div class="fields1">
                <div class="a1">
                    <div>
                        <label class="mylab">TC NO. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" class="myfield" value="<?php echo $tc_data['TC_NO']; ?>" readonly><br>
                        <label class="mylab">TC DATE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" class="myfield" value="<?php echo formatDate($tc_data['TC_DATE']); ?>" readonly><br>
                        <label class="mylab">PROCESS ROUTE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" class="myfield" value="<?php echo $tc_data['PROCESS_ROUTE']; ?>" readonly><br>
                        <label class="mylab">DE-OXIDATION PRACTICE :</label>
                        <input type="text" class="myfield" value="<?php echo $tc_data['DE_OXIDATION']; ?>" readonly><br>
</div>
                </div>
                <div class="a2">
                    <div>
                        <label class="mylab">DELIVERY NO. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" class="myfield" value="<?php echo $tc_data['DELVER_NO']; ?>" readonly><br>
                        <label class="mylab">PURCHASE ORDER NO. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" class="myfield" value="<?php echo $tc_data['PURCHASE_ORD_NO']; ?>" readonly><br>
                        <label class="mylab">CUSTOMER NO. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" class="myfield" value="<?php echo $tc_data['CUSTOMER_NAME']; ?>" readonly><br>
                        <label class="mylab">SUPPLY CONDITION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                        <input type="text" class="myfield" value="<?php echo $tc_data['SUPPLY_COND']; ?>" readonly><br>
</div>
                </div>
            </div><br>
            <div class="mytext">
                We certify that the materials described below conform to the chemical composition and mechanical properties of the product as tested in accordance with the scheme of testing and inspection obtained in the ISI Certification marks License No CM/L 5550868 are indicated against each other (Please refer to IS 1786:2008 for details of specification requirement).
            </div>
            <br>
            <label class="mylab" style="font-size: large;">Materials :</label>
            <input type="text" class="myfield4" value="<?php echo $tc_data['MATERIAL_1']; ?>" readonly>&nbsp;&nbsp;&nbsp;<input type="text" class="myfield4" value="<?php echo $tc_data['MATERIAL_2']; ?>" readonly><br><br>
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
                    <td><input type="text" id="heatno" readonly class="mybox" value="<?php echo $tc_data['HEATNO']; ?>"></td>
                    <td><input type="text" id="bundle" readonly class="mybox" value="<?php echo $tc_data['BUNDLE']; ?>"></td>
                    <td><input type="text" id="%C" readonly class="mybox" value="<?php echo $tc_data['CARBON']; ?>"></td>
                    <td><input type="text" id="%P" readonly class="mybox" value="<?php echo $tc_data['PHOSPHORUS']; ?>"></td>
                    <td><input type="text" id="%S" readonly class="mybox" value="<?php echo $tc_data['SULPHER']; ?>"></td>
                    <td><input type="text" id="%CE" readonly class="mybox" value="<?php echo $tc_data['CE']; ?>"></td>
                    <td><input type="text" id="Wt" readonly class="mybox" value="<?php echo $tc_data['WTMKGMTR']; ?>"></td>
                    <td><input type="text" id="proof" readonly class="mybox" value="<?php echo $tc_data['PROOF_STRESS']; ?>"></td>
                    <td><input type="text" id="tensile" readonly class="mybox" value="<?php echo $tc_data['TENSILE_STRENGTH']; ?>"></td>
                    <td><input type="text" id="elong" readonly class="mybox" value="<?php echo $tc_data['ELONGATION']; ?>"></td>
                    <td><input type="text" id="totelong" readonly class="mybox" value="<?php echo $tc_data['T_ELONGATION']; ?>"></td>
                    <td><input type="text" id="bend" readonly class="mybox" value="<?php echo $tc_data['BEND']; ?>"></td>
                    <td><input type="text" id="rebend" readonly class="mybox" value="<?php echo $tc_data['REBEND']; ?>"></td>
                </tr>
            </table><br>
            <div class="bot">
                <div class="left1">
                    <label class="mylab">Remarks :</label>
                    <input type="text" class="myfield2" id="remarks" readonly value="<?php echo $tc_data['REMARK']; ?>"><br><br>
                    <label class="mylab3">Dispatch Advice No. &nbsp;&nbsp;&nbsp;&nbsp;:</label>
                    <input type="text" class="myfield3" id="dispno" readonly value="<?php echo $tc_data['DISPATCH_ADVICE_NO']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="mylab">Prepared By &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                    <input type="text" class="myfield" id="prepby" readonly  value="<?php echo $tc_data['PREPARED_BY']; ?>"><br><br>
                    <label class="mylab3">Truck/Wagon Number :</label>
                    <input type="text" class="myfield3" id="truckno" readonly value="<?php echo $tc_data['TRUCK_NO']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="mylab">Preparation Date :</label>
                    <input type="text" class="myfield" id="prepdate" readonly value="<?php echo formatDate($tc_data['PREPARATION_DATE']); ?>">
                </div>
                <div class="right1">
                    <img src="sign.jpg" alt="Signature" class="myimg">
                    <p>Authorized Signature</p>
                </div>
            </div>
        </main>
    </div>
    <button onclick="generateAndSendPDF()">Generate and Send PDF</button>

    <script>
    function generateAndSendPDF() {
        const element = document.getElementById('fullp');

        html2canvas(element, {
            scrollY: -window.scrollY,
            logging: true,
            windowWidth: element.scrollWidth,
            windowHeight: element.scrollHeight
        }).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const pdf = new jsPDF('landscape', 'px', 'a4'); // Landscape orientation, using pixels, A4 size

            const imgProps = pdf.getImageProperties(imgData);
            const pdfWidth = pdf.internal.pageSize.getWidth();
            const pdfHeight = pdf.internal.pageSize.getHeight();

            pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);

            // Save PDF file
            pdf.save('document.pdf');

            // Example of sending PDF via email
            sendPDFViaEmail(pdf.output('blob'));
        }).catch(error => {
            console.error('Error generating PDF:', error);
            alert('Failed to generate PDF');
        });
    }

    function sendPDFViaEmail(pdfBlob) {
        // Example: Sending PDF via email using fetch
        fetch('http://localhost/jindal/send-pdf-email.php', {
            method: 'POST',
            body: pdfBlob
        }).then(response => {
            if (!response.ok) {
                throw new Error('Failed to send PDF via email');
            }
            alert('PDF sent successfully!');
        }).catch(error => {
            console.error('Error sending PDF via email:', error);
            alert('Failed to send PDF via email');
        });
    }
</script>
</body>
</html>
