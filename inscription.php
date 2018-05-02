<?php
    session_start();

    require './bdd.php';

    if (isset($_POST['login']) && isset($_POST['password'])) {

        $sql = "INSERT into clients (login, password, nom, prenom, email, ville, code_postal, adresse) VALUES ('".$_POST['login']."', '".$_POST['password']."', '".$_POST['nom']."', '".$_POST['prenom']."
        ','".$_POST['email']."', '".$_POST['ville']."', '".$_POST['code_postal']."', '".$_POST['adresse']."')";
        if ($mysqli->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }

    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        include './menu.php';
    ?>

    <div id="background-connexion">
        <div class="fill"></div>
        <form id="connexion-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <label for="pseudo">Login</label><br>
            <input type="text" name="login" maxlength="20" placeholder="Login" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required"><br><br>

            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password"  required="required">

            <label for="nom">Nom</label><br>
            <input type="text" name="nom" placeholder="votre nom"><br><br>

            <label for="prenom">Prénom</label><br>
            <input type="text" name="prenom" placeholder="votre prénom"><br><br>

            <label for="email">Email</label><br>
            <input type="email" name="email" placeholder="exemple@gmail.com"><br><br>
<!--
          <label for="civilite">Civilité</label><br>
            <input name="civilite" value="m" checked="" type="radio">Homme
            <input name="civilite" value="f" type="radio">Femme<br><br> -->

            <label for="ville">Ville</label><br>
            <input type="text" name="ville" placeholder="votre ville" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés : a-zA-Z0-9-_."><br><br>

            <label for="cp">Code Postal</label><br>
            <input type="text" name="code_postal" placeholder="code postal" pattern="[0-9]{5}" title="5 chiffres requis : 0-9"><br><br>

            <label for="adresse">Adresse</label><br>
            <textarea name="adresse" placeholder="votre adresse" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_."></textarea><br><br>

            <input name="inscription" value="S'inscrire" type="submit">

            <input type="submit" value="Se connecter">
            <a id="already-register" href="./connexion.php">Déjà inscrit ? Se connecter</a>
        </form>
    </div>
</body>
</html>
