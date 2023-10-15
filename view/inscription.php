<?php
$nom    = '';
$prenom = '';
$login  = '';
$mail   = '';

if (isset($_SESSION['reload'])) {
    $data       = $_SESSION['reload'];

    $nom    = $data['nom'];
    $prenom = $data['prenom'];
    $login  = $data['login'];
    $mail   = $data['mail'];

    unset($_SESSION['reload']);
}
?>

<!---head --->
<?php include 'head.php'; ?>
<!--- Fin de head --->


    <!-------------- CONTENU DE LA PAGE "INSCRIPTION.PHP" ------------------>
    <main id="contenu-inscription" role="main">

        <!-- Formulaire d'inscription -->
        <form action="inscription.ctrl" method="post" id="inscriptionForm">
            <h2>Inscrivez-vous !</h2>

            <div>

                <input type="text" name="nom" id="inputNom" placeholder="Nom" value="<?php echo $nom; ?>">
                <label for="inputNom">Votre nom</label>
            </div>
            <div>
                <input type="text" name="prenom"  id="inputPrenom" placeholder="Prenom" value="<?php echo $prenom; ?>">
                <label for="inputPrenom">Votre prénom</label>
            </div>
            <div>
                <input type="text" name="login"  id="inputLogin" placeholder="Pseudo" value="<?php echo $login; ?>">

                <label for="inputLogin">Votre pseudo</label>
            </div>
            <div>
                <input type="text" name="mail" id="inputMail" placeholder="Email" value="<?php echo $mail; ?>">

                <label for="inputMail">Votre email</label>
            </div>
            <div>
                <input type="password" name="mdp" id="inputPassword" placeholder="Mot de passe">

                <label for="inputPassword">Votre mot de passe</label>
            </div>
            <div class="form-floating">
                <input type="password" name="mdpbis"id="inputMdpBis" placeholder="Confirmation de votre mot de passe">
                <label for="inputMdpBis">Confirmation de votre mot de passe</label>
            </div>
            <div>
                <label for="conditions">
                    <input type="checkbox" name="conditions" id="conditions">
                    J'ai lu et j'accepte <a href="#">les conditions d'utilisation</a>
                </label>
            </div>

            <p id="password-match"></p>
            <button type="submit">S'inscrire</button>

        </form>

<!-------------- FIN DU CONTENU DE LA PAGE "INSCRIPTION.PHP" ------------------>