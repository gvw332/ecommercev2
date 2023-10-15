
<!-------------- CONTENU DE LA PAGE "updatecontact.php" ------------------>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ecommerce GVW-tech</title>
	<link href="../styles/styles.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/5e020b3118.js" crossorigin="anonymous"></script>
</head>

<body>
	<main id="contenu-updatecontact" class="contenu-updatecontact" role="main" style="background-color: rgb(138, 220, 113);" role="main">

		<form class="w-75 m-auto pt-5 pb-5" action="admin.save" method="post" id="inscriptionForm">
			<h2 class="h3 mb-3 fw-normal text-black text-center">Modification</h2>
			<div class="form-floating mb-3 hidden">
				<input type="text" name="id" value="<?php echo $id; ?>">
			</div>
			<div class="form-floating mb-3 hidden">
				<input type="text" name="niveau" value="<?php echo $niveau; ?>">
			</div>
			<div class="form-floating mb-3">
				<input type="text" name="nom" class="form-control text-black bg-white" id="floatingInput" placeholder="Nom" value="<?php echo $nom; ?>">
				<label for="floatingInput">Nom</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" name="prenom" class="form-control text-black bg-white" id="floatingPassword" placeholder="Prenom" value="<?php echo $prenom; ?>">
				<label for="floatingPassword">Prénom</label>
			</div>
			<div class="form-floating mb-3">
				<input type="text" name="login" class="form-control text-black bg-white" id="floatingPassword" placeholder="Pseudo" value="<?php echo $login; ?>">
				<label for="floatingPassword">Pseudo</label>
			</div>

			<div class="form-floating mb-3">
				<input type="text" name="mail" class="form-control text-black bg-white" id="floatingPassword" placeholder="Email" value="<?php echo $mail; ?>">
				<label for="floatingPassword">Email</label>
			</div>

			<button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Valider</button>
		</form>
	</main>
	<script src="javascript/addtocart.js"></script>
</body>

</html>
<!-------------- FIN DU CONTENU DE LA PAGE "updatecontact.php" ------------------>