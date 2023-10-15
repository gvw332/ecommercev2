<?php 
Session::checkLogin();
$niveau = 0;
$pseudo = '';

if (isset($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];
    $niveau = $_SESSION['niveau'];
}
?>
<!-- NAVIGATION --->

<div class="header">
    <a href="accueil"><img style="max-width: 175px;" class="logo" src="<?= IMAGES ?>logo_small.png" alt="logo"></a>

    <div class="nav">
    <?php if ($niveau >= 1) : ?>
                <h1><?= isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : '' ?></h1>
                
                <div class="deconnexion"><a href="deconnexion"><i class="fa-regular fa-user"></i></a></div>
                <i class="fa-solid fa-cart-shopping"></i>
                <p id="count"><?= count($_SESSION['cart']) ?></p>
    <?php else : ?>
        
                <div class="connexion"><a href="connexion"><i class="fa-regular fa-user"></i></a></div>
                
                <div class="connexion"><a href="connexion">Connexion</i></a></div>
    <?php endif; ?>


        <?php

        if (isset($_SESSION['userLoggedIn']) && $_SESSION['userLoggedIn']) {
            // L'utilisateur est connecté, affichez le panier et le nombre d'achats
            echo '<i class="fa-solid fa-cart-shopping"></i>';
            echo '<p id="count">';
            $cartCount = count($_SESSION['cart']);
            if ($cartCount > 0) {
                echo "<span class='cart-count'>$cartCount</span>";
            } else {
                echo "<span class='cart-count'>0</span>";
            }
            echo '</p>';
        }
        ?>
    </div>
</div>
<!-- FIN DE NAVIGATION --->