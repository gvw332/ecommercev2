<?php


$panier = null;
if (isset($params['panier'])) {
  $panier = $params['panier'];
  unset($params['panier']);
} else {
  unset($params['panier']);
}


?>


<section id="content">
  <section class="cards">

    <?php foreach ($params as $item) : ?>

      <article class="card">
        <h2><?php echo $item->title; ?></h2>

        <form action="details" method="POST" class="form-detail">

          <img src="<?php echo IMAGES; ?><?php echo $item->image; ?>">
          <button type="submit" id="imageButton">click</button>

          <input type="hidden" name="id" value="<?php echo $item->id; ?>" />
        </form>

        <p><?php echo $item->price; ?> €</p>

        <form method="POST" action="add.panier">
          <input type="hidden" name="id" value="<?php echo $item->id; ?>" />

          <button type="submit" name="add">Ajouter au panier</button>
        </form>
      </article>

    <?php endforeach ?>



  </section>
  <aside id="panier">
    <div id="modal-panierx" class="modalx">

      <div class="modal-panier-content">
        <h2 class="titre-modal-panier">PANIER</h2>
        <?php $session->flash();?>
        <br>
        
        <?php if ($session->count() < 1) : ?>
          <h1 class="modal-chapitre"> Votre panier est vide</h1>
        <?php else : ?>
          <h1 class="modal-chapitre">Total : <?= number_format($session->total(), 2, ',', ' ') ?> € </h1>

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
        <?php if (isset($panier) && ($session->count() > 0)) : ?>
          <a href="payer">Commander ici</a>
          
        <?php else : ?>
          <p>Sélectionner un produit</p>
        <?php endif; ?>
        <br><br>
  </aside>
</section>