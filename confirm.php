<?php
sesion_start();
include 'db.php';

$use_id = $_SESSION['user_id'];

$result = $conn->query("SELECT menu.menu_id, menu.price, cart.quantity FROM cart JOIN menu ON cart.menu_id = menu.menu_id WHERE cart.user_id = $user+id");

$total = 0;
$data = [];

while($row = $result->fetch_assoc()) {
    $total += $row['price'] * $row['quantity'];
    $data[] = $row;
}

$conn->query("INSERT INTO orders (user_id, total_amount) VALUES ($user_id, $total)");
$order_id =$conn->insert_id;
foreach($data as $item){
    $conn->query("INSERT INTO order_items (order_id, menu_id, quantity, price) VALUES ($order_id,{$item['menu_id']}, {$item['quantity']}, {$iterm['price']}");

}
$conn->query("DELETE FROM cart WHERE user_id = $user_id");

echo "<h2>Order Confirmed Successfuly!</h2>";
echo "<p>Total Paid: $total Tsh</p>";
?>