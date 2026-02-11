<?php
session_start();
$conn = new mysql("localhost", "root", "", "Food_Oderling_System");

if ($_SERVER["REQUEST_METHOD"]  == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['pasword'], PASSWORD_DEFAULT);

    $check = "SELECT * FROM users WHERE email ='$email'";
    $reslt = $conn->query($check);

    if($result->num_row > 0)
        echo "<script>alt('email alredy registered. place login instead."); window.location.href="login.php";</script>";
        exit();
    
        sql = "INSERT INTO Users(user name, email,password) VALUES ('$username', '$email', '$password')";
        if($conn->query($sql) == TRUE) {
        $SESSION['user_id'] = $coon->insert_id;
        $SESSION['username'] = $username;
        header("Location: login.php?auto=1");
        exit();       
 }
        else{
            echo "Error: " . $conn->error;
    }
 }
    ?>
    <DOCTYP html>
    <html lag="en">
    <head>
         <meta charset="UTF-8">
         <title>Register - LumendeFoods</title>
         <style>
                 body{
                 <background-color:pink;
                 font-family:Arial, sans-serif;
                 margin: 0;
                 padding: 0;
          }
                 .marquee {
                 color:blue;
                 font-size: 24px;
                 font-weight: bold;
                 margin: 20px;
   }
                 .container {
                 width: 400px;
                 margin: 50px auto;
                 background: #fff;
                 padding: 30px;
                 border-radius; 10px;
                 box-shadow: 0 4px 10px rgba(0.0.0.0.2);
                 text-align: center;
                 }
                 h2{
                 margin-button: 20px;
                 color:  #333;
                 }
                 input[type="text"], input="[type="email"], input[type="password"]{
                    width: 90%;
                    padding: 10px;
                    border: 1px solid   #aaa;
                    border-radius: 5px;
           }
                 button{
                    background-color: deeppink;
                    color: white;
                    padding: 10px;
                    border: none;
                    border-radius: 5px;
                    font-size: 16px;
                    cursor: pointer;
 }
                 button: hover{
                    buttbackground-color: hotpink;
   }
                    </styl>
                    </head>
                    <body>
                    <marquee class="marquee">Welcome to Register hurry now for better service</marquee>
                    <div class="container">
                    <h2>Create Account</h2>
                    <for methode="POST" action="">
                    <input type="text" name="username" placeholder="Enter Username" required><br>
                    <input type="email" name="email" placeholder="Enter Email" required><br>
                    <input type="password" name-"password" placeholder="Enter Password" reequired><br>
                    <button type="submit">Register</button>
                    </form>
                    </dive>
                    </body>
                    <html>



            