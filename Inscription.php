<?php
require_once("inc/init.inc.php");
if($_POST)
{
	debug($_POST);
	$verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']); 
	if(!$verif_caractere || strlen($_POST['pseudo']) < 1 || strlen($_POST['pseudo']) > 20 )
	{
		$contenu .= "<div class='erreur'>Le pseudo doit contenir entre 1 et 20 caractères. <br> Caractère accepté : Lettre de A à Z et chiffre de 0 à 9</div>";
	}
	if(empty($contenu)) 
	{
		$membre = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'"); 
		if($membre->num_rows > 0)
		{
			$contenu .= "<div class='erreur'>Pseudo indisponible. Veuillez en choisir un autre svp.</div>";
		}
		else
		{
			foreach($_POST as $indice => $valeur)
			{
				$_POST[$indice] = htmlEntities(addSlashes($valeur));
			}
			executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postale, adresse) VALUES ('$_POST[pseudo]', '$_POST[mdp]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[civilite]', '$_POST[ville]', '$_POST[code_postal]', '$_POST[adresse]')");
			$contenu .= "<div class='validation'>Vous êtes inscrit à notre site web. <a href=\"connexion.php\"><u>Cliquez ici pour vous connecter</u></a></div>";
		}
	}
}
?>
<?php require_once("inc/haut.inc.php"); ?>
<?php echo $contenu; ?>

<html>
    <head>
        <title>Inscription - FreeSK8</title>
        <link rel="stylesheet" media="screen" href="style/inscription.css"/>
        <link rel="stylesheet" media="screen" href="style/homepage.css"/>
    </head>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h3><strong>Inscription</strong></h3>
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" maxlength="20" placeholder="votre pseudo" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required"><br><br>

        <label for="mdp">Mot de passe</label><br>
        <input type="password" id="mdp" name="mdp" placeholder="votre mot de passe" required="required"><br><br>

        <label for="nom">Nom</label><br>
        <input type="text" id="nom" name="nom" placeholder="votre nom" required="required"><br><br>

        <label for="prenom">Prénom</label><br>
        <input type="text" id="prenom" name="prenom" placeholder="votre prénom" required="required"><br><br>

        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" placeholder="exemple@gmail.com" required="required"><br><br>

        <label>Civilité</label><br>
        <input class="sexe" name="sexe" value="m" checked="" type="radio">Homme
        <input class="sexe" name="sexe" value="f" type="radio">Femme<br><br>

        <label for="ville">Ville</label><br>
        <input type="text" id="ville" name="ville" required="required" placeholder="votre ville" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés : a-zA-Z0-9-_."><br><br>

        <label for="code_postal">Code Postal</label><br>
        <input type="text" id="code_postal" name="code_postal" required="required" placeholder="code postal" pattern="[0-9]{5}" title="5 chiffres requis : 0-9"><br><br>

        <label for="adresse">Adresse</label><br>
        <textarea id="adresse" name="adresse" required="required" placeholder="votre adresse" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_."></textarea><br><br>

        <input name="inscription" value="S'inscrire" type="submit">
    </form>
</html>
 
<?php require_once("inc/bas.inc.php"); ?>