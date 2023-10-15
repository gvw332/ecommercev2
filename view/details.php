<?php
// Définition des produits
$products = [
    [
        'id' => 0,
        'image' => '../images/poster.jpg',
        'title' => 'Poster',
        'price' => 10,
        'details' => '0Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, in.',
    ],
    [
        'id' => 1,
        'image' => '../images/mug.jpg',
        'title' => 'Mug',
        'price' => 15,
        'details' => '1Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, in.',
    ],
    [
        'id' => 2,
        'image' => '../images/bougie.jpg',
        'title' => 'Bougie',
        'price' => 17,
        'details' => '2Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, in.',
    ],
    [
        'id' => 3,
        'image' => '../images/couverture-chauffante.jpg',
        'title' => 'Couverture-chauffante',
        'price' =>  19,
        'details' => '3Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, in.',
    ],
    [
        'id' => 4,
        'image' => '../images/tshirt.jpg',
        'title' => 'T-shirt',
        'price' => 14,
        'details' => '4Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, in.',
    ],
    [
        'id' => 5,
        'image' => '../images/spiruline-paillettes-100g.jpg',
        'title' => 'Spiruline /100g',
        'price' => 17,
        'details' => '5Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, in.',
    ],
    [
        'id' => 6,
        'image' => '../images/coque-tel.jpg',
        'title' => 'Coque Smartphone',
        'price' => 8,
        'details' => '6Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, in.',
    ],
];

// Démarrer la session
// session_start();

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

// Appelle Modal
if (isset($_POST['modal'])) {
    header('Location: poster');
}
?>

<?php

if (isset($_SESSION['details'])) {
    $product = $_SESSION['details'];

};

?>

<div class="container">
    <div id="root-card">

        <div class="box-card">

            <form method="post">
                <div class="img-box">
                    <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                    <button type="submit" name="modal"><img class="images" src="<?php echo IMAGES . $product['image']; ?>"></button>
                </div>
            </form>


            <!-- <a class="modal" href="#"><img class="images" src="<?php echo IMAGES . $product['image']; ?>"></a> -->

            <div class="bottom-pannier">
                <p><?php echo $product['title']; ?></p>
                <h2>€ <?php echo $product['price']; ?>.00</h2>

                <form method="post">
                    <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
                    <button type="submit" name="addToCart">Ajouter au panier</button>
                </form>
            </div>
        </div>
        <p><?php echo $product['details']; ?></p>
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
                    <img class="rowimg" src="<?php echo IMAGES . $cartProduct['image']; ?>">
                </div>
                <p style="font-size: 12px;"><?php echo $cartProduct['title']; ?></p>
                <h2 style="font-size: 15px">€ <?php echo $cartProduct['price']; ?>.00</h2>
                <form method="post">
                    <input type="hidden" name="productIndex" value="<?php echo $index; ?>">
                    <button class="button-corbeil" type="submit" name="removeFromCart"><i class="fa-solid fa-trash"></i></button>
                </form>
            </div>
        <?php
        }
        ?>
    </div>
</div>


<!-- FIN DE PANIER --->