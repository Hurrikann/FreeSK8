<?php 
function executeRequete($req)
{
	global $mysqli; 
	$resultat = $mysqli->query($req); 
	if (!$resultat)
	{
		die("Erreur sur la requete sql.<br />Message : " . $mysqli->error . "<br />Code: " . $req);
	}
	return $resultat;
}
 
function debug($var, $mode = 1) 
{
		echo '<div style="background: orange; padding: 5px; float: right; clear: both; ">';
		//Fonction prédéfinie retournant un tableau Array contenant des informations tel que 
		//la ligne et le fichier où est exécuté la fonction
		$trace = debug_backtrace();
		//var_dump($trace);
		//Extrait la première valeur d'un tableau et la retourne
		$trace = array_shift($trace);
		echo "Debug demandé dans le fichier : $trace[file] à la ligne $trace[line].<hr />";
		if($mode === 1)
		{
			echo "<pre>"; print_r($var); echo "</pre>";
		}
		else
		{
			echo "<pre>"; var_dump($var); echo "</pre>";
		}
	echo '</div>';
}




