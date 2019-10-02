<?php
require 'classes/Product.php';
require 'classes/ProductCatalogue.php';
require 'classes/ShoppingCart.php';
session_start();

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = new ShoppingCart();
}
$productCatalogue = new ProductCatalogue('products.json');

$product = $productCatalogue->getProduct($_GET['code']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Winkelwagen</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="webshop">
    <h2 class="webshop__title">My first webshop <a href="cart.php" class="cart-icon">Winkelmandje</a></h2>
    <div class="webshop__content">
        <img class="webshop__content--image" src="<?php echo $product->getImage() ?>" alt="<?php echo $product->getTitle() ?>">
        <h2><?php echo $product->getTitle() ?></h2>
        <p><?php echo $product->getDescription() ?></p>
        <p class="price"><?php echo $product->getPrice() ?></p>
    </div>
    <footer>
        <a href="index.php">Naar de producten</a>
    </footer>
</section>
</body>
</html>