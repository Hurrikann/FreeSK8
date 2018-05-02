<?php
    session_start();

    require './bdd.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        include './menu.php';

        echo '<h1>Mon panier</h1>';

        if (!isset($_SESSION['user'])) {
            echo "Vous devez être connecté pour accéder à cette page";
            die();
        }

        if (isset($_COOKIE['cart'])) {
            $cart = [];

            $products = explode(',', $_COOKIE['cart']);

            foreach ($products as $product_id) {
                $sql = "SELECT * from products WHERE id='".$product_id."'";
                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $cart[] = [
                            'name' => $row['name'],
                            'price' => $row['price'],
                        ];
                    }
                }
            }

            $total = 0;

            foreach ($cart as $item) {
                $total = $total + $item['price'];

                echo "<ul>
                    <li>".$item['name']."</li>
                    <li>".$item['price']."</li>
                </ul>";
            }

            echo "<div>Total : ".$total."€</div>";

        } else {
            echo "Panier vide.";
        }

    ?>
    
    


</body>
</html>