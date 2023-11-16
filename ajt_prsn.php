<?php
	include 'functions.foyer.php';
	if ($_POST['g-recaptcha-response']){
		$db = new db($dbhost, $dbuser, $dbpass, $dbname);
		$insert = $db->query("INSERT INTO `foyer_insr` (`id_foyer`, `prenom_foyer`, `nom_foyer`, `id_ph`, `id_js`) VALUES (NULL, '".$_POST['prenom']."', '".$_POST['nom']."', '".$_POST['heure']."', '".$_POST['jour']."')");
		include 'footer.php';
		header('Location: index.php');
	} else{
		echo "<head>";
		$css = array("css.css");
		afficher_head("ROBOT!!!!", $css, "UTF-8");
		echo"</head>
				<h1 id=\"h1-spr\">Cocher la case \"Je ne suis pas un robot\"</h1>
				<div id=\"div-retour\"><a id=\"a\" href=\"index.php\">Retour</a></div>";
	}	
?>