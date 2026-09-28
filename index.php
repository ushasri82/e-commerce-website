<?php
session_start();
include "db.php";

$result = $conn->query("SELECT * FROM products ORDER BY id DESC");

$cart_count = 0;

if (isset($_SESSION['cart'])) {
    $cart_count = array_sum($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ashu Online Shopping</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<!-- ================= HEADER ================= -->

<header>

    <div class="logo">
        <span>Ashu</span> Online Shopping
    </div>

    <nav>

        <a href="index.php">Home</a>

        <a href="#products">Products</a>

        <a href="#features">About Us</a>

        <a href="cart.php" class="cart-button">
            🛒 Cart
            <span class="cart-count">
                <?php echo $cart_count; ?>
            </span>
        </a>

    </nav>

</header>


<!-- ================= HERO ================= -->

<section class="hero">

    <div class="hero-content">

        <div class="hero-badge">
            💗 Welcome to Ashu Online Shopping
        </div>

        <h1>
            Hope you enjoy your
            <span>time while shopping.</span>
        </h1>

        <p>
            Discover amazing products, beautiful styles
            and everyday essentials — all in one place.
            Happy shopping! 💙
        </p>

        <div class="hero-buttons">

            <a href="#products" class="btn">
                Shop Now 🛍️
            </a>

            <a href="#features" class="btn btn-outline">
                Explore More
            </a>

        </div>

    </div>

    <div class="hero-decoration">

        <div class="floating-card card-one">
            🛍️
        </div>

        <div class="floating-card card-two">
            💖
        </div>

        <div class="floating-card card-three">
            ✨
        </div>

    </div>

</section>


<!-- ================= SEARCH ================= -->

<section class="search-section">

    <div class="search-title">
        <h2>Find what you're looking for 🔎</h2>

        <p>
            Search through our products below
        </p>
    </div>

    <div class="search-box">

        <span>🔍</span>

        <input
            type="text"
            id="search"
            placeholder="Search for products..."
            onkeyup="searchProducts()"
        >

    </div>

    <div id="no-products" class="no-products">

        <div class="no-products-icon">
            😔
        </div>

        <h3>
            Product not available
        </h3>

        <p id="no-products-text">
            Sorry, we couldn't find that product.
        </p>

        <button
            onclick="clearSearch()"
            class="clear-button"
        >
            Show All Products
        </button>

    </div>

</section>


<!-- ================= CATEGORIES ================= -->

<section class="categories">

    <button
        class="category active"
        onclick="filterCategory('all', this)"
    >
        All Products
    </button>

    <button
        class="category"
        onclick="filterCategory('electronics', this)"
    >
        📱 Electronics
    </button>

    <button
        class="category"
        onclick="filterCategory('fashion', this)"
    >
        👕 Fashion
    </button>

    <button
        class="category"
        onclick="filterCategory('shoes', this)"
    >
        👟 Shoes
    </button>

    <button
        class="category"
        onclick="filterCategory('accessories', this)"
    >
        👜 Accessories
    </button>

    <button
        class="category"
        onclick="filterCategory('lifestyle', this)"
    >
        ✨ Lifestyle
    </button>

</section>


<!-- ================= PRODUCTS ================= -->

<section class="products" id="products">

    <div class="section-header">

        <div>

            <div class="small-heading">
                OUR COLLECTION
            </div>

            <h2>
                Popular Products
            </h2>

            <p>
                Pick your favorites and enjoy shopping with Ashu 💗
            </p>

        </div>

    </div>


    <div class="product-grid">

        <?php

        if ($result && $result->num_rows > 0) {

            while ($product = $result->fetch_assoc()) {

                $product_name =
                    strtolower($product['name']);

                /*
                 * Category detection
                 */

                if (
                    strpos($product_name, 'headphone') !== false ||
                    strpos($product_name, 'earbud') !== false ||
                    strpos($product_name, 'speaker') !== false ||
                    strpos($product_name, 'mouse') !== false ||
                    strpos($product_name, 'keyboard') !== false ||
                    strpos($product_name, 'phone') !== false ||
                    strpos($product_name, 'laptop') !== false ||
                    strpos($product_name, 'watch') !== false ||
                    strpos($product_name, 'powerbank') !== false ||
                    strpos($product_name, 'power bank') !== false ||
                    strpos($product_name, 'cable') !== false
                ) {

                    $category = "electronics";

                } elseif (
                    strpos($product_name, 'shirt') !== false ||
                    strpos($product_name, 'tshirt') !== false ||
                    strpos($product_name, 'dress') !== false ||
                    strpos($product_name, 'handbag') !== false ||
                    strpos($product_name, 'sunglass') !== false
                ) {

                    $category = "fashion";

                } elseif (
                    strpos($product_name, 'shoe') !== false ||
                    strpos($product_name, 'sneaker') !== false
                ) {

                    $category = "shoes";

                } elseif (
                    strpos($product_name, 'backpack') !== false ||
                    strpos($product_name, 'travel') !== false ||
                    strpos($product_name, 'fitness') !== false ||
                    strpos($product_name, 'bottle') !== false
                ) {

                    $category = "lifestyle";

                } else {

                    $category = "accessories";
                }

                /*
                 * Use the image URL saved in database.
                 */

                $image =
                    $product['image'];

        ?>

        <div
            class="product-card"
            data-name="<?php echo strtolower(htmlspecialchars($product['name'])); ?>"
            data-category="<?php echo $category; ?>"
        >

            <div class="product-image">

                <img
                    src="<?php echo htmlspecialchars($image); ?>"
                    alt="<?php echo htmlspecialchars($product['name']); ?>"
                    loading="lazy"
                    onerror="this.src='https://placehold.co/600x600/fce7f3/2563eb?text=Image+Not+Available';"
                >

                <div class="sale-badge">
                    SALE
                </div>

                <button
                    class="wishlist"
                    onclick="addWishlist(this)"
                    type="button"
                >
                    ♡
                </button>

            </div>


            <div class="product-info">

                <div class="product-category">
                    <?php echo strtoupper($category); ?>
                </div>

                <h3>
                    <?php echo htmlspecialchars($product['name']); ?>
                </h3>

                <div class="rating">
                    ★★★★★
                    <span>4.8</span>
                </div>

                <div class="price-row">

                    <div class="price">

                        ₹<?php echo number_format($product['price'], 2); ?>

                    </div>

                    <form
                        action="add_to_cart.php"
                        method="POST"
                    >

                        <input
                            type="hidden"
                            name="product_id"
                            value="<?php echo $product['id']; ?>"
                        >

                        <button
                            type="submit"
                            class="add-cart"
                        >
                            +
                        </button>

                    </form>

                </div>

            </div>

        </div>

        <?php

            }

        } else {

        ?>

        <div class="empty-store">

            <div class="empty-icon">
                🛍️
            </div>

            <h3>
                No products available
            </h3>

            <p>
                Products will appear here once they are added.
            </p>

        </div>

        <?php

        }

        ?>

    </div>

</section>


<!-- ================= FEATURES ================= -->

<section class="features" id="features">

    <div class="feature">

        <div class="feature-icon pink">
            🚚
        </div>

        <h3>
            Fast Delivery
        </h3>

        <p>
            Get your favorite products delivered
            quickly to your doorstep.
        </p>

    </div>


    <div class="feature">

        <div class="feature-icon blue">
            🔒
        </div>

        <h3>
            Secure Shopping
        </h3>

        <p>
            Shop comfortably with secure
            and protected transactions.
        </p>

    </div>


    <div class="feature">

        <div class="feature-icon pink">
            💎
        </div>

        <h3>
            Quality Products
        </h3>

        <p>
            Discover products selected
            for quality and value.
        </p>

    </div>


    <div class="feature">

        <div class="feature-icon blue">
            💬
        </div>

        <h3>
            Customer Support
        </h3>

        <p>
            We're here to help whenever
            you need us.
        </p>

    </div>

</section>


<!-- ================= FOOTER ================= -->

<footer>

    <div class="footer-content">

        <div class="footer-brand">

            <div class="footer-logo">
                Ashu Online Shopping
            </div>

            <p>
                Hope you enjoy your time while shopping.
                Find something you love today! 💗
            </p>

        </div>


        <div class="footer-column">

            <h3>
                Shop
            </h3>

            <a href="#products">
                All Products
            </a>

            <a href="#products">
                Electronics
            </a>

            <a href="#products">
                Fashion
            </a>

        </div>


        <div class="footer-column">

            <h3>
                Help
            </h3>

            <a href="#">
                Contact Us
            </a>

            <a href="#">
                Shipping
            </a>

            <a href="#">
                Returns
            </a>

        </div>


        <div class="footer-column">

            <h3>
                Account
            </h3>

            <a href="#">
                Login
            </a>

            <a href="#">
                Register
            </a>

            <a href="cart.php">
                My Cart
            </a>

        </div>

    </div>


    <div class="footer-bottom">

        <p>
            © 2026 Ashu Online Shopping.
            Made with 💗 and 💙
        </p>

    </div>

</footer>


<!-- ================= JAVASCRIPT ================= -->

<script>

let currentCategory = "all";


function searchProducts() {

    const input =
        document.getElementById("search");

    const search =
        input.value.trim().toLowerCase();

    const products =
        document.querySelectorAll(".product-card");

    const noProducts =
        document.getElementById("no-products");

    const message =
        document.getElementById("no-products-text");

    let found = 0;


    products.forEach(product => {

        const name =
            product.dataset.name;

        const category =
            product.dataset.category;

        const matchesSearch =
            name.includes(search);

        const matchesCategory =
            currentCategory === "all" ||
            category === currentCategory;


        if (
            matchesSearch &&
            matchesCategory
        ) {

            product.style.display = "";

            found++;

        } else {

            product.style.display = "none";

        }

    });


    if (
        search !== "" &&
        found === 0
    ) {

        noProducts.style.display = "block";

        message.innerHTML =
            `Sorry, we couldn't find
            "<strong>${input.value}</strong>"
            in our store.`;

    } else {

        noProducts.style.display = "none";

    }

}


function clearSearch() {

    document.getElementById("search").value = "";

    currentCategory = "all";

    document
        .querySelectorAll(".category")
        .forEach(button => {
            button.classList.remove("active");
        });

    document
        .querySelector(".category")
        .classList.add("active");

    searchProducts();

}


function filterCategory(category, button) {

    currentCategory = category;

    document
        .querySelectorAll(".category")
        .forEach(btn => {
            btn.classList.remove("active");
        });

    button.classList.add("active");

    searchProducts();

}


function addWishlist(button) {

    if (button.innerHTML.trim() === "♡") {

        button.innerHTML = "♥";

        button.classList.add("liked");

    } else {

        button.innerHTML = "♡";

        button.classList.remove("liked");

    }

}

</script>

</body>
</html>
