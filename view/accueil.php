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
</section>