<?php
$item = $params[0];

?>
<div class="bouton-back">
    <a href="accueil">
        <button class="btn-back">
            Retour en arrière
        </button>
    </a>
</div>
<section id="article-panier-details">



    <article class="card-details">



        <img src="<?php echo IMAGES; ?><?php echo $item->image; ?>" alt="bougie">
        <div class="info-produit">
            <h2><?php echo $item->title; ?></h2>
            <p><?php echo $item->price; ?> €</p>
            <p>details produits Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, quis illum. Eveniet corrupti, voluptate consequatur incidunt obcaecati illum facere! Nulla quasi libero quibusdam a itaque ducimus sed quaerat minus, tempora, numquam vero doloribus earum. Aut, numquam rem. Nemo doloribus accusamus nihil nobis quae, laborum voluptatibus odit error, exercitationem iure debitis at. Esse ratione atque quo blanditiis placeat? Soluta libero dolor vero tempora facere quibusdam fugiat voluptatibus, vel, doloribus id minus unde qui ex aperiam consequatur iure natus quam ducimus, quos aspernatur incidunt nostrum cumque facilis. Repudiandae tempore qui autem at similique sed, vero placeat nisi rerum in tempora, ut odit aliquid debitis! Cupiditate nostrum veniam delectus expedita rem incidunt eaque aut natus! Porro exercitationem fugit totam doloremque dolorum consequuntur maxime molestiae, incidunt voluptatibus corrupti pariatur maiores nostrum dolor nam quibusdam distinctio aperiam cumque ex! Error culpa ut a quasi, voluptate adipisci vel, amet, optio numquam ab eos? Soluta, exercitationem voluptas.</p>
        </div>


    </article>


    <aside id="panier">
        <div id="modal-panierx" class="modalx">

            <div class="modal-panier-content">
                <h2 class="titre-modal-panier">PANIER</h2>
                <br>
                <?php if ($session->count() < 1) : ?>
                    <h1 class="modal-chapitre"> Votre panier est vide</h1>
                <?php else : ?>
                    <h1 class="modal-chapitre">Total : <?= number_format($session->total(), 2, ',', ' ') ?> € </h1>
                    <h2 class="modal-chapitre">Item : <?= number_format($session->count(), 0, ',', ' ') ?></h2>
                <?php endif; ?>

                <table>

                    <tbody>
                        <?php if (isset($panier)) : ?>
                            <?php foreach ($panier as $item) : ?>
                                <tr>
                                    <td><img src="<?php echo IMAGES; ?><?php echo $item->image; ?>" alt="<?php echo $item->title; ?>"></td>
                                    <td><?php echo $item->title; ?></td>
                                    <td><?php echo $item->price; ?>€</td>
                                    <td>
                                        <form class="moins" method="POST" action="moins.panier">
                                            <input type="hidden" name="id" value="<?php echo $item->id; ?>" />
                                            <button type="submit" name="moins" class="moins-btn"><i class="fa-solid fa-minus"></i></button>
                                        </form>
                                        <?php echo $_SESSION["panier"][$item->id]; ?>
                                        <form class="moins" method="POST" action="plus.panier">
                                            <input type="hidden" name="id" value="<?php echo $item->id; ?>" />
                                            <button type="submit" name="plus" class="plus-btn"><i class="fa-solid fa-plus"></i></button>
                                        </form>
                                    </td>
                                    <td><?php echo $item->price * $_SESSION["panier"][$item->id]; ?>€</td>
                                    <td>
                                        <form method="POST" action="del.panier">
                                            <input type="hidden" name="id" value="<?php echo $item->id; ?>" />
                                            <button type="submit" name="del"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
                <br><br>
                <p>Total : <?php echo $session->total(); ?> €</p>
                <br><br>
                <button>Commander</button>
                <br><br>
    </aside>

</section>