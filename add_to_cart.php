<?php

include "db.php";

if (!isset($_POST['product_id'])) {
    header("Location: index.php");
    exit;
}

$product_id = (int) $_POST['product_id'];

$result = $conn->query(
    "SELECT id FROM products WHERE id = $product_id"
);

if ($result->num_rows === 0) {
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id]++;
} else {
    $_SESSION['cart'][$product_id] = 1;
}

header("Location: cart.php");
exit;

?>
