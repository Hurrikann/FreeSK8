<?php
if (isset($_POST['logout'])) {
    session_unset(); 
    session_destroy(); 
}
?>

<nav id="navbar">
    <a id="navbar-logo" href="#home"><img id="logo" src="img/logo.png" alt="Logo site"></a>
    <ul id="nav-links">
        <li class="nav-link">
            <a href="./index.php">Accueil</a>
        </li>
        <li class="nav-link">
            <a href="./connexion.php">Connexion</a>
        </li>
        <li class="nav-link">
            <a href="./inscription.php">Inscription</a>
        </li>

        <?php
        if (isset($_SESSION['user'])) {
            echo '<li class="nav-link" ><a href="./boutique.php">Boutique</a></li>';
            echo '<li class="nav-link"><a href="./panier.php">Panier</a></li>';
        }
        ?>

<?php
    if (isset($_SESSION['user'])) {
        echo "<span id='deconnexion'>Connecté en temps que " . $_SESSION['user'] . "&nbsp;&nbsp;&nbsp;";

        echo "<form method='post' class='nav-link' action='" . $_SERVER['PHP_SELF'] . "'>
            <input type='submit' class='nav-link' value='Se déconnecter' name='logout'>
        </form></span>";
    }
    ?>
    </ul>
</nav>