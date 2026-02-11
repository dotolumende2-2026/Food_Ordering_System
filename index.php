<?php
session_start();
$conn= new mysqli("localhost", "root", "","Food_Odering_System");
if($conn->connect_error){
        die("connection failed:" . $conn->connect_error);
}

$result = $conn->query("SELECT*FROM menu_items LIMIT 4");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LumendeFood - Home</title>
        <link rel="stylesheet" href="Asserts/css/style.css">
</head>
<body>
    <header class="navbar">
        <div class="logo">LumendeFood</div>
        <nav>
            <a href="index.php" class="active">Home</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
</nav>
</header>

<section class="hellow">
    <h1>Welcome to LumendeFoods</h1>
    <p>Order now fresh, sweet and affordable meals</p>
    <div class="cta-buttons">
        <a href="register.php" class="btn">Create Account</a>
        <a href="login.php" class="btn">Login</a>
</div>
</section>

<section class="menu-preview">
    <h2>Food Preview</h2>
    <div class="food-list">
        <?php while ($row = $result->fetch_assoc()) { ?>
    <div class="food-item">
        <img src="Assets/images/<?php echo $row['image']; ?>" alt="<?php echo $row['name'];?>" style="width:300px; height:auto; border-radius:8px">
        <h3><?php echo $row['name']; ?></h3>
        <p>Price: <?php echo $row['price']; ?> TZS</p>
        <p><?php echo $row['description']; ?></p>
        <p class="note">Login to order</p>
    </div>
     <?php  } ?>
     </div>
     </section>

     <footer>
            <p>&copy; 2026 LumendeFood. All rights reserved.</p>
        </footer>
        </body>
        </html>
         
              


        

