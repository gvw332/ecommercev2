<?php
// Définition des produits
$products = [
    [
        'id' => 0,
        'image' => '../images/poster.jpg',
        'title' => 'Poster',
        'price' => 10,
    ],
    [
        'id' => 1,
        'image' => '../images/mug.jpg',
        'title' => 'Mug',
        'price' => 15,
    ],
    [
        'id' => 2,
        'image' => '../images/bougie.jpg',
        'title' => 'Bougie',
        'price' => 17,
    ],
    [
        'id' => 3,
        'image' => '../images/couverture-chauffante.jpg',
        'title' => 'Couverture-chauffante',
        'price' =>  19,
    ],
    [
        'id'=> 4,
        'image' => '../images/tshirt.jpg',
        'title' => 'T-shirt',
        'price' => 14,
    ],
    [
        'id'=>5,
        'image' => '../images/spiruline-paillettes-100g.jpg',
        'title' => 'Spiruline /100g',
        'price '=> 17,
    ],
    [
        'id'=> 6,
        'image' => '../images/coque-tel.jpg',
        'title' => 'Coque Smartphone',
        'price'=> 8,
    ],

];

// Démarrer la session
session_start();

// Si le panier n'existe pas en session, initialisez-le
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ajouter un produit au panier
if (isset($_POST['addToCart'])) {
    $productId = $_POST['productId'];
    if (array_key_exists($productId, $products)) {
        array_push($_SESSION['cart'], $products[$productId]);
    }
}

// Supprimer un produit du panier
if (isset($_POST['removeFromCart'])) {
    $productIndex = $_POST['productIndex'];
    if (array_key_exists($productIndex, $_SESSION['cart'])) {
        unset($_SESSION['cart'][$productIndex]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Réorganiser les indices
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Votre code HTML et CSS ici -->
</head>
<body>
    <div id="root">
        <?php foreach ($products as $product): ?>
            <div class="box">
                <div class="img-box">
                    <img class="images" src="<?php echo $product['image']; ?>">
                </div>
                <div class="bottom">
                    <p><?php echo $product['title']; ?></p>
                    <h2>€ <?php echo $product['price']; ?>.00</h2>
                    <form method="post">
                        <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                        <button type="submit" name="addToCart">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="cartItem">
        <?php
        if (empty($_SESSION['cart'])) {
            echo "Votre panier est vide";
        }
        ?>
    </div>

    <div id="cart">
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $index => $cartProduct) {
            $total += $cartProduct['price'];
        }
        echo "Total : € $total.00";

        // Afficher les produits dans le panier
        foreach ($_SESSION['cart'] as $index => $cartProduct) {
            ?>
            <div class="cart-item">
                <div class="row-img">
                    <img class="rowimg" src="<?php echo $cartProduct['image']; ?>">
                </div>
                <p style="font-size: 12px;"><?php echo $cartProduct['title']; ?></p>
                <h2 style="font-size: 15px">€ <?php echo $cartProduct['price']; ?>.00</h2>
                <form method="post">
                    <input type="hidden" name="productIndex" value="<?php echo $index; ?>">
                    <button type="submit" name="removeFromCart">Retirer</button>
                </form>
            </div>
            <?php
        }
        ?>
    </div>
</body>
</html>
