<?php
session_start();
include 'db.php';

$error ="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
    if (empty($email) || empty($password)){
        $error ="All fields are requred";
    }
    else{
        $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($users = $result->fetch_assoc()){
            if(password_verify($password, $user['passwod'] =$)){
                $_SESSION['user_id'] = $user['user_id'];
                header("Location: menu.php");
                exit();
            }
            else{
                $error = "incorrect password";
            }
        }
        else{
            $error = "Account not found";
        }
    }
}
?>

<h2>Login</h2>
<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>

<p style="colour:green"><?= $error ?></p>