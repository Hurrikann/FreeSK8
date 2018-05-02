<?php
    session_start();

    require './bdd.php';

    if (isset($_POST['login']) && isset($_POST['password'])) {

        $sql = "SELECT * from clients WHERE login='".$_POST['login']."' AND password='".$_POST['password']."'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION["user"] = $_POST['login'];
        } else {
            echo "Identifiants incorrects";
        }

    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        include './menu.php';
    ?>
    <div id="background-connexion">
        <div class="fill"></div>
        <form class="change-height" id="connexion-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="login">Login</label>
            <input type="text" placeholder="Login" name="login">
            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password">

            <input type="submit" value="Se connecter">
            <a id="go-to-inscription" href="./inscription.php">Pas encore membre ? inscrivez-vous</a>
        </form>
    </div>



</body>
</html>