<?php
Session::checkLogin();
$niveau = 0;
$pseudo = '';

if (isset($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];
    $niveau = $_SESSION['niveau'];
}

// $panier = null;
// if (isset($params['panier'])) {
//     $panier = $params['panier'];
//     unset($params['panier']);
// } else {
//     unset($params['panier']);
// }

?>
<!-- NAVIGATION --->

<header class="header">
    <a href="accueil"><img style="max-width: 175px;" class="logo" src="<?= IMAGES ?>logo_small.png" alt="logo"></a>

    <div class="nav">
        <?php if ($niveau >= 1) : ?>
            <h1><?= isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : '' ?></h1>

            <div class="deconnexion"><a href="deconnexion"><i class="fa-regular fa-user"></i></a></div>


            <div class="panier-nav open-modal" data-modal="modal-panier">
                <i class="fa-solid fa-cart-shopping"></i>
                <p id="count"><?php echo $session->count(); ?></p>
            </div>


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


    <div id="modal-panier" class="modal">

        <div class="modal-panier-content">
            <h2 class="titre-modal-panier">PANIER</h2>
            <br>
            <?php if ($session->count() < 1) : ?>
                <h1 class="modal-chapitre"> Votre panier est vide</h1>
            <?php else : ?>
                <h1 class="modal-chapitre">Total : <?= number_format($session->total(), 2, ',', ' ') ?> € </h1>
                <h1 class="modal-chapitre">Item : <?= number_format($session->count(), 0, ',', ' ') ?></h1>
            <?php endif; ?>


        <?php if (isset($panier)) : ?>
            <?php foreach ($panier as $item) : ?>

                <span class="img-panier"><img src="<?php echo IMAGES; ?><?php echo $item->image; ?>" alt="<?php echo $item->title; ?>"></span>
                <span><?php echo $item->title; ?></span>
                <span><?php echo $item->price; ?></span>
                <span>
                    <form method="POST" action="moins.panier">
                        <input type="hidden" name="id" value="<?php echo $item->id; ?>" />
                        <button type="submit" name="moins">-</button>
                    </form>
                </span>
                <span><?php echo $_SESSION["panier"][$item->id]; ?></span>
                <span>
                    <form method="POST" action="plus.panier">
                        <input type="hidden" name="id" value="<?php echo $item->id; ?>" />
                        <button type="submit" name="plus">+</button>
                    </form>
                    <span>
                        <form method="POST" action="del.panier">
                            <input type="hidden" name="id" value="<?php echo $item->id; ?>" />
                            <button type="submit" name="del">Poubelle</button>
                        </form>
                    </span>
                </span>


            <?php endforeach ?>
        <?php endif; ?>    

            <p><?php echo $session->total(); ?></p>
            <button>Commander</button>
        </div>
    </div>
</header>
<!-- FIN DE NAVIGATION --->