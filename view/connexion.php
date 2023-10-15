

	<!-------------- CONTENU DE LA PAGE "CONNEXION.PHP" ------------------>
	<main id="contenu-connection" role="main">

		<form action="connexion.ctrl" method="post">
			<h2>Connectez-vous !</h2>

			<div>
				<input type="text" name="pseudo" class="form-control text-black " id="floatingInput" placeholder="name@example.com">
				<label for="floatingInput">Votre pseudo ou email</label>
			</div>
			<div>
				<input type="password" name="mdp" class="form-control text-black" id="floatingPassword" placeholder="Password">
				<label for="floatingPassword">Mot de passe</label>
			</div>

			<a href="mdp-demande" class="">Mot de passe oublié ?</a>

			<a href="inscription.php" class="">Pas encore inscrit ?</a>

			<button type="submit">Se connecter</button>
			<br><br><br><br><br>
		</form>

	</main>

<!-------------- FIN DU CONTENU DE LA PAGE "CONNEXION.PHP" ------------------>
