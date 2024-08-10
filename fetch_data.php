<?php
session_start();

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "jspl";

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching data from POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tcno'])) {
    $tcno = $_POST['tcno'];

    // Sanitize input to prevent SQL Injection (optional but recommended)
    $tcno = mysqli_real_escape_string($conn, $tcno);

    // Query to fetch data based on TC number
    $sql = "SELECT * FROM emp1 WHERE TC_NO = '$tcno'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        // Found data, fetch and store in session
        $row = $result->fetch_assoc();
        $_SESSION['tc_data'] = $row;

        // Redirect to bill.php or any other processing page
        header("Location: bill.php");
        exit();
    } else {
        echo "No data found for TC number: " . $tcno;
    }
}

$conn->close();
?>
