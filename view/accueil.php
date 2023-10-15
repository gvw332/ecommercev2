<?php


$panier = null;
if (isset($params['panier'])) {
  $panier = $params['panier'];
  unset($params['panier']);
} else {
  unset($params['panier']);
}


?>

<h1>Accueil</h1>
<section class="cards">

  <?php foreach ($params as $item) : ?>

    <article class="card">
      <h2><?php echo $item->title; ?></h2>
      <img src="<?php echo IMAGES; ?><?php echo $item->image; ?>" alt="bougie">
      <p><?php echo $item->price; ?> €</p>

      <form method="POST" action="add.panier">
        <input type="hidden" name="id" value="<?php echo $item->id; ?>" />
        <button type="submit" name="add">Ajouter au panier</button>
      </form>
    </article>

  <?php endforeach ?>



</section>