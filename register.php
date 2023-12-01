<?php

include('db.php');

// Client-side validation using JavaScript can be added here

$conn = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        if (!isset($_POST['email']) || !isset($_POST['pass'])) {
            throw new Exception("Email and password are required.");
        }

        $email = $_POST['email'];
        $password = $_POST['pass'];

        $conn->addUser($email, $password);
        echo '<div class="message" style="text-align: center; font-size:30px; color: green;"  onclick="this.remove();">' . "User is successfully added" . '</div>';
    } catch (Exception $e) {
        echo '<div class="message" style="text-align: center; font-size:30px; color: red;" onclick="this.remove();">' . htmlspecialchars($e->getMessage()) . '</div>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 50vh;
            margin: 0;
        }
        form {
            width: 500px;
        }
    </style>
</head>
<body>
    <h1>Register</h1>
    <form method="POST">
        <div class="form-group">
            <label for="gebruiker">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="wachtwoord">Password:</label>
            <input type="password" class="form-control" id="wachtwoord" name="pass" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</body>
</html>
