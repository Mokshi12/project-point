<?php
// Initialize session and include necessary files
require_once("./initialize.php");
session_start();

// Check if the user is logged in as admin
// You may need to implement proper authentication and authorization mechanisms
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Redirect the user to the login page or display an error message
    header("Location: login.php");
    exit;
}

// Create an instance of the DBConnection class
$dbConnection = new DBConnection();

// Get the database connection
$conn = $dbConnection->conn;

// Retrieve payment details from the database based on the booking ID
$booking_id = $_GET['id']; // Assuming booking ID is passed via GET parameter
$stmt = $conn->prepare("SELECT * FROM payment_details WHERE booking_id = ?");
$stmt->bind_param("i", $booking_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if payment details exist
if ($result->num_rows > 0) {
    // Fetch and display payment details
    $row = $result->fetch_assoc();
    echo "<h2>Payment Details</h2>";
    echo "<p><strong>Full Name:</strong> " . $row['full_name'] . "</p>";
    echo "<p><strong>Name on Card:</strong> " . $row['name_on_card'] . "</p>";
    echo "<p><strong>Card Number:</strong> " . $row['card_number'] . "</p>";
    echo "<p><strong>CVV:</strong> " . $row['card_cvv'] . "</p>";
    echo "<p><strong>Expiry Month:</strong> " . $row['exp_month'] . "</p>";
    echo "<p><strong>Expiry Year:</strong> " . $row['exp_year'] . "</p>";
    echo "<p><strong>Amount:</strong> " . $row['amount'] . "</p>";
    echo "<p><strong>Contact number:</strong> " . $row['contactnumber'] . "</p>";
} else {
    echo "Payment details not found for the selected booking.";
}

$stmt->close();
$conn->close();
?>
