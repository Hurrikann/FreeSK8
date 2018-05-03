<?php
    session_start();

    require './bdd.php';

    if (isset($_POST['addToCart'])) {

        if (isset($_COOKIE['cart'])) {
            $cookie_name = "cart";
            $cookie_value = $_COOKIE['cart'].','.$_POST['product_id'];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

        } else {
            $cookie_name = "cart";
            $cookie_value = $_POST['product_id'];
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        }
        
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Boutique</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        include './menu.php';
        if (!isset($_SESSION['user'])) {
            echo "Vous devez être connecté pour accéder à cette page";
            die();
        }

        $sql = "SELECT * from produits";
        $result = $mysqli->query($sql);

        // Liste des produits
        echo "<ul class='products-list'>";
        echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>";

        //if ($result['num_rows'] > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>
                    <p>".$row['nom']." - ".$row['prix']."</p>
                    <input type='hidden' value='".$row['id_produit']."' name='product_id'>
                    <input type='submit' value='Ajouter au panier' name='addToCart'>
                </li>";
            }
        //} else {
        //    echo "La boutique ne contient aucun produits.";
        //}


        echo "</form>";
        echo "</ul>";
    ?>


</body>
</html>