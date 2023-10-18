<?php
$email = '';

if (isset($_SESSION['reload']['login'])) {
  $email = $_SESSION['reload']['login'];
}
?>
<!-------------- CONTENU DE LA PAGE "MDP-OUBLIE.PHP" ------------------>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce GVW-tech</title>
  <link href="styles/styles.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5e020b3118.js" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Demande d'un nouveau mot de passe (envoi par mail) -->
  <main id="container-mdpforgotten"  role="main">
    <div>
      <h5>Vous êtes sur la page de changement de mot de passe</h5>
      <form action="mdp-demande.ctrl" method="post">
        <div class="form-group">
          <label for="email">Email<span>*</span></label>
          <input type="text" name="login" class="form-control" id="email" value="<?= $email ?>" required>
        </div>
        <div class="pt-3 pb-3">
          <button type="submit" class="btn btn-primary btn-nouveau-mdp">Demande d'un nouveau mot de passe</button>
        </div>
      </form>
    </div>
  </main>
  <script src="javascript/addtocart.js"></script>
</body>

</html>

<!-------------- FIN DU CONTENU DE LA PAGE "MDP-OUBLIE.PHP" ------------------>