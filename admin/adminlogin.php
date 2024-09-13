<?php
require_once("../initialize.php");

session_start();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputUsername = trim($_POST['username']);
    $inputPassword = trim($_POST['password']);

    if (!empty($inputUsername) && !empty($inputPassword)) {
        $host = DB_SERVER1;
        $db = DB_NAME1;
        $user = DB_USERNAME1;
        $pass = DB_PASSWORD1;

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT password FROM admin_credentials WHERE username = :username");
            $stmt->bindParam(':username', $inputUsername);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                if (hash('sha256', $inputPassword) == $row['password']) {
                    $_SESSION['username'] = $inputUsername;
                    header("Location: index.php");
                    exit();
                } else {
                    $error = 'Invalid username or password';
                }
            } else {
                $error = 'Invalid username or password';
            }
        } catch (PDOException $e) {
            $error = 'Database error: ' . $e->getMessage();
        }
    } else {
        $error = 'Please enter both username and password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="icon" href="../assets/img/aeroplane6.png" type="image/png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            width: 300px;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
            font-size: 14px;
        }

        .no-underline {
            text-decoration: none;
        }

        .no-underline:hover {
            text-decoration: underline;
        }

        .link-container {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter the username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter the password" required>
            </div>
            <button type="submit">Login</button>
            <?php
            if ($error) {
                echo '<h4><div class="error">' . htmlspecialchars($error) . '</div></h4>';
            }
            ?>
            <div class="link-container">
                <b><a href="/tourism/index.php" class="no-underline">Go to Website</a></b>
            </div>
        </form>
    </div>
</body>
</html>
