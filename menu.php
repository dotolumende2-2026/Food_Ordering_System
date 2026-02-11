<?php
session_srart();
include 'db.php' ;
if (!isset($SESSION['user_id'])){
    header("Location: login.php");
}

$result = $conn->query("SELECT menu.menu_id, menu.item_name, menu.price, categories.category_name FROM menu JOIN categories ON menu.category_id = categories.category_id");
?>

<h2>Food menu</h2>

<?php while($row = $result->fetch assoc()): ?>
    <div style="border: 1px solid #ccc; padding: 10px; margin :10px;">
        <h3><?= $row['item_name'] ?></h3>
        <p>category: <?=$row['category_name'] ?></p>
        <p>Price: <?= $row['price'] ?> Tsh</p>

        <form method="POST" action="cart.php">
            <input type="hidden" name="menu_id" value="<?=$row['menu_id'] ?>">
            <input type="number" name="quantity" value="1" min="1">
            <button type="submit">Add to Cart</button>
</form>
</div>
<?php endwhile; ?>

<a href="cart.php"View Cart<?a>
