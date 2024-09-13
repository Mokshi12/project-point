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
           
            if (!$this->conn) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
    }

    public function __destruct(){
        $this->conn->close();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['full_name']) && !empty($_POST['name_on_card']) && !empty($_POST['card_number']) && !empty($_POST['card_cvv']) && !empty($_POST['exp_month']) && !empty($_POST['exp_year']) && !empty($_POST['amount']) && !empty($_POST['contactnumber'])) {
  
    $_SESSION['payment_details'] = $_POST;
    $dbConnection = new DBConnection();

    $conn = $dbConnection->conn;

    $stmt = $conn->prepare("INSERT INTO payment_details (full_name, name_on_card, card_number, card_cvv, exp_month, exp_year, amount,contactnumber) VALUES (?, ?, ?, ?, ?, ?, ?,?)");

    if ($stmt) {
        $stmt->bind_param("ssssssss", $_POST['full_name'], $_POST['name_on_card'], $_POST['card_number'], $_POST['card_cvv'], $_POST['exp_month'], $_POST['exp_year'], $_POST['amount'], $_POST['contactnumber']);


        $stmt->execute();
        
        $stmt->close();
        
        header('Location: http://localhost/tourism/index.php?payment_success=true');
        exit;

    } else {
 
        echo "Prepare statement failed: " . $conn->error;
    }
} else {
    echo "<p>Error: Please fill out all fields correctly.</p>";
}
?>





