<?php

include "db.php";

$cart = $_SESSION['cart'] ?? [];

$total = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Shopping Cart</title>

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

<div class="container">

    <h1>Shopping Cart</h1>

    <?php if (empty($cart)) { ?>

        <p>Your cart is empty.</p>

        <a href="index.php" class="btn">
            Continue Shopping
        </a>

    <?php } else { ?>

        <table>

            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>

            <?php

            foreach ($cart as $product_id => $quantity) {

                $product_id = (int) $product_id;

                $result = $conn->query(
                    "SELECT * FROM products WHERE id = $product_id"
                );

                $product = $result->fetch_assoc();

                if (!$product) {
                    continue;
                }

                $subtotal = $product['price'] * $quantity;

                $total += $subtotal;

            ?>

                <tr>

                    <td>
                        <?php echo htmlspecialchars($product['name']); ?>
                    </td>

                    <td>
                        ₹<?php echo number_format($product['price'], 2); ?>
                    </td>

                    <td>
                        <?php echo $quantity; ?>
                    </td>

                    <td>
                        ₹<?php echo number_format($subtotal, 2); ?>
                    </td>

                    <td>
                        <a
                            href="remove_from_cart.php?id=<?php echo $product_id; ?>"
                            class="remove"
                        >
                            Remove
                        </a>
                    </td>

                </tr>

            <?php } ?>

        </table>

        <div class="cart-total">

            <h2>
                Total:
                ₹<?php echo number_format($total, 2); ?>
            </h2>

            <a href="checkout.php" class="btn">
                Checkout
            </a>

        </div>

    <?php } ?>

</div>

</body>
</html>
