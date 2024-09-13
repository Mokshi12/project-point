<?php
require_once("./initialize.php");

session_start();

class DBConnection{

    private $host = DB_SERVER1;
    private $username = DB_USERNAME1;
    private $password = DB_PASSWORD1;
    private $database = DB_NAME1;
    public $conn;
    
    public function __construct(){
    
        if (!isset($this->conn)) {
            
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            
            if ($this->conn->connect_error) {
                die('Cannot connect to database server: ' . $this->conn->connect_error);
            }            
        }    
        
    }
    public function __destruct(){
        $this->conn->close();
    }

// Query to retrieve all data from the payment_details table
$sql = "SELECT * FROM payment_details";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Access each column of the row
        echo "ID: " . $row["id"]. " - Full Name: " . $row["full_name"]. " - Name on Card: " . $row["name_on_card"]. " - Card Number: " . $row["card_number"]. " - CVV: " . $row["card_cvv"]. " - Expiry Month: " . $row["exp_month"]. " - Expiry Year: " . $row["exp_year"]. " - Contact Number: " . $row["contactnumber"]. " - Amount: " . $row["amount"]. " - Created At: " . $row["created_at"]. "<br>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
}
?>
