<!Doctype html>
<html>
    <head>
        <title>Mon Site</title>
        <link rel="stylesheet" href="<?php echo RACINE_SITE; ?>inc/css/style.css" />
    </head>
    <body>    
        <header>
			<div class="conteneur">                      
				<span>
					<a href="" title="Mon Site">MonSite.com</a>
                </span>
				<nav>
					<?php
						echo '<a href="' . RACINE_SITE . 'inscription.php">Inscription</a>';
						echo '<a href="' . RACINE_SITE . 'connexion.php">Connexion</a>';
						echo '<a href="' . RACINE_SITE . 'boutique.php">Accès à la boutique</a>';
						echo '<a href="' . RACINE_SITE . 'panier.php">Voir votre panier</a>';
					?>
				</nav>
			</div>
        </header>
        <section>
			<div class="conteneur">       