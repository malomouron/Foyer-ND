<?php
	include ('functions.foyer.php');
	if ($_POST['g-recaptcha-response']){
		$css = array("css.css");
		afficher_head("Suprimer une personne", $css, "UTF-8");
		if ($_POST['pass'] == $mdp_foyer){
			$db = new db($dbhost, $dbuser, $dbpass, $dbname);
			$delete = $db->query("DELETE FROM `foyer_insr` WHERE `foyer_insr`.`id_foyer` = ".$_POST['prsn']);
			header('Location: index.php');
		} else{
			echo "<h1 id=\"h1-spr\">Mauvais mot de passe</h1>
					<div id=\"div-retour\"><a id=\"a\" href=\"index.php\">Retour</a></div>";
		}
	}else{
		echo "<head>";
		$css = array("css.css");
		afficher_head("ROBOT!!!!", $css, "UTF-8");
		echo"</head>
				<h1 id=\"h1-spr\">Cocher la case \"Je ne suis pas un robot\"</h1>
				<div id=\"div-retour\"><a id=\"a\" href=\"index.php\">Retour</a></div>";
	}
?>