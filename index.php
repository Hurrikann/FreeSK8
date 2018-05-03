<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Meta tags -->
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Site Ecommerce Free Sk8">
    <meta name="author" content="Bastien Maurin">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="style.css">


    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="./img/logo.png">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!-- Title -->
    <title>SK8 FunShop</title>
</head>
<body>
<?php
include './menu.php';
?>

<img id="image-bg" src="img/skatefond3.jpg" alt="image background">

<section id="home">
    <div id="welcome-box">
        <img id="portrait" src="img/sk8.png" alt="sk8">
        <h1>SK8 FunShop</h1>
        <span id="subtitle">Bienvenue sur notre site de vente en ligne SK8 FunShop, ici vous pourrez en savoir plus sur nos produits, voir nos réalisations et consulter nos articles. Ce site à été conçut
        par une équipe d'éleves en B1 ingésup </span>
    </div>
</section>

<section id="presentation">
    <div class="container">
        <div class="row">
            <div class="col-3"><h2 class="presentation-title">Qui sommes-nous ?</h2></div>
            <div class="col-9">
                <p>SK8 Fun shop vend tout ce que vous souhaité dans le domaine du skateboard. Nous vous proposons un large choix de skateboard, longboard et tout type de planche a roulette.
                    Sk8 Fun shop est constitué avant tout d'une équipe de passionnés de skateboard et de fabrication artisanale, n'hésitez pas à nous adresser toute vos demandes et questions.</p>
            </div>
        </div>
        <hr class="separator">
        <div class="row">
            <div class="col-3"><h2 class="presentation-title">Nos catégorie</h2></div>
            <div class="col-9">
                <div class="img-presentation-container"><img class="img-presentation" src="img/longboard.jpg" alt="longboard"><span class="img-presentation-text">LongBoards</span></div>
                <div class="img-presentation-container"><img class="img-presentation" src="img/skateboard.jpg" alt="skateboard"><span class="img-presentation-text">SkateBoards</span></div>
                <div class="img-presentation-container"><img class="img-presentation" src="img/penny.jpg" alt="penny"><span class="img-presentation-text">Penny</span></div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="footer-title">Nous contacter</h3>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td><label for="email">Adresse Email</label></td>
                            <td><input name="email" type="email" placeholder="sk8@yahoo.fr" id="email"></td>
                        </tr>
                        <tr>
                            <td><label for="subject">Sujet</label></td>
                            <td><input name="subject" type="text" placeholder="Saisir sujet" id="subject"></td>
                        </tr>
                        <tr>
                            <td><label for="message">Message</label></td>
                            <td><textarea name="message" cols="30" rows="5" id="message"></textarea></td>
                        </tr>
                        <tr>
                            <td><button type="submit" onclick="mail();">Envoyer</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-6">
                <h3 class="footer-title">Nous suivre</h3>
                <div class="col-3"><a href=""><img class="social-link" src="img/fb-icon.png" alt="facebook"></a></div>
                <div class="col-3"><a href="https://twitter.com/"><img class="social-link" src="img/twitter-icon.png" alt="twitter"></a></div>
                <div class="col-3"><a href=""><img class="social-link" src="img/linkedin-icon.png" alt="linkedin"></a></div>
            </div>
        </div>
        <div class="row" id=copyright>Copyright © 2018 Bastien Maurin, tous droits réservés.</div>
    </div>
</footer>
</body>
</html>