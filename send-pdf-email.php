<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load Composer's autoloader
require 'vendor/autoload.php';

// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jspl';

// Attempt to establish connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle POST request to send PDF via email
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $pdfFile = $_FILES['file']['tmp_name'];
    $emailQuery = "SELECT * FROM user_mang where username=email"; // Adjust query to fetch emails from your database
    $result = mysqli_query($conn, $emailQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        // Load PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                        // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'princekittu3105@gmail.com';                  // SMTP username
            $mail->Password   = 'KITTU@3101anish';                        // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 25;                                    // TCP port to connect to
            $mail->SMTPDebug  = 2;                                      // Enable verbose debug output

            // Recipients
            while ($row = mysqli_fetch_assoc($result)) {
                $mail->setFrom('princekittu3105@gmail.com', 'Jindal Steel and Power');
                $mail->addAddress($row['email']);                       // Add a recipient

                // Attachments
                $mail->addAttachment($pdfFile, 'document.pdf');         // Add attachments

                // Content
                $mail->isHTML(true);                                    // Set email format to HTML
                $mail->Subject = 'PDF Document from Jindal Steel and Power';
                $mail->Body    = 'Please find attached the PDF document.';

                $mail->send();
                echo 'Email sent to ' . $row['email'] . '<br>';
            }
        } catch (Exception $e) {
            echo "Email sending failed. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'No email addresses found in the database.';
    }
} else {
    echo 'Invalid request.';
}

// Close database connection
mysqli_close($conn);
?>
