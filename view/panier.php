<?php 
  $panier = $params;
?>

</section>
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