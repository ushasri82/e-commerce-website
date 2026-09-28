<?php

include "db.php";

$cart = $_SESSION['cart'] ?? [];

if (empty($cart)) {
    header("Location: cart.php");
    exit;
}

$total = 0;

foreach ($cart as $product_id => $quantity) {

    $product_id = (int) $product_id;

    $result = $conn->query(
        "SELECT price FROM products WHERE id = $product_id"
    );

    $product = $result->fetch_assoc();

    if ($product) {
        $total += $product['price'] * $quantity;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);

    if ($name === '' || $email === '' || $address === '') {

        $error = "Please fill in all fields.";

    } else {

        $stmt = $conn->prepare(
            "INSERT INTO orders
            (customer_name, email, address, total)
            VALUES (?, ?, ?, ?)"
        );

        $stmt->bind_param(
            "sssd",
            $name,
            $email,
            $address,
            $total
        );

        $stmt->execute();

        $_SESSION['cart'] = [];

        $success = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Checkout</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <div class="logo">MyShop</div>

    <nav>
        <a href="index.php">Home</a>
        <a href="cart.php">Cart 🛒</a>
    </nav>

</header>

<div class="checkout">

    <?php if (isset($success)) { ?>

        <div class="success">

            <h1>Order Placed! 🎉</h1>

            <p>
                Thank you for your order.
            </p>

            <a href="index.php" class="btn">
                Continue Shopping
            </a>

        </div>

    <?php } else { ?>

        <h1>Checkout</h1>

        <?php if (isset($error)) { ?>

            <p class="error">
                <?php echo htmlspecialchars($error); ?>
            </p>

        <?php } ?>

        <form method="POST">

            <label>Name</label>

            <input
                type="text"
                name="name"
                required
            >

            <label>Email</label>

            <input
                type="email"
                name="email"
                required
            >

            <label>Address</label>

            <textarea
                name="address"
                rows="5"
                required
            ></textarea>

            <h2>
                Total:
                ₹<?php echo number_format($total, 2); ?>
            </h2>

            <button type="submit" class="btn">
                Place Order
            </button>

        </form>

    <?php } ?>

</div>

</body>
</html>
