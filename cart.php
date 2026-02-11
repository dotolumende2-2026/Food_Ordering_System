<?php
session_sstart();
include 'db.php';
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHODE"] == "POST"){
    $menu_id= intval($_POST['menu_id']);
    $quantity = intval($POST['quantity']);

    $stmt = $conn->prepare("INSERT INTO cart (user_id, menue_id, quantity) (
    VALUES (?,?,?)");
    $stmt =$conn->bind_param("iii", $user_id, $menu_id, $quantity);
    $stmt->excute();
}
$result = $conn->query("SELECT cart.cart_id, menu.item_name, menu.price, cart.quantity FROM cart JOIN menu ON cart.menu_id = menu.menu_id WHERE cart.user_id = $user_id");
?>

<h2>My Cart</h2>

<?php
$totlal = 0;
while($row = $result->fetch_assec());
$subtotal = $row['price']* $row['quantity'];
$total += $subtotal;
?>
<p>
    <?= $row['item_name'] ?>|
    Qty: ?= $row['quantity'] ?>|
    Subtotal: <?= $subtotal ?> Tsh
</p>
<?php endwhile; ?>

<h3>Total: <?= $total ?> Tsh</h3>
<a href="confirm.php">Confirm Order</A>