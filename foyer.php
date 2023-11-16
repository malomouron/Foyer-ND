<?php
	include ('functions.foyer.php');
	$db = new db($dbhost, $dbuser, $dbpass, $dbname);
	$conn = new mysqli($servername, $username, $password, $dbname);
	$select_ph = $db->query('SELECT * FROM `foyer_plage_horaire`')->fetchAll();
	$select_js = $db->query('SELECT * FROM `foyer_jour_semaine`')->fetchAll();
?>
<!DOCTYPE html>
<html>
	<head>
		
<?php
		$css = array("css.css");
		afficher_head("Horaire pour le foyer", $css, "UTF-8");
?>
	</head>
	<body>
		<!-- 
		<script type="text/javascript" src="https://tarteaucitron.io/load.js?domain=malomouron.fr&uuid=717548e03c23ca2a33134c1d121db8baff70e83d"></script>
		<div class="youtube_player" videoID="kJQP7kiw5Fk" width="889px" height="500px" theme="theme (dark | light)" rel="rel (1 | 0)" controls="controls (1 | 0)" showinfo="showinfo (1 | 0)" autoplay="autoplay (0 | 1)" mute="mute (0 | 1)"></div>-->
		<h1>Tableau d'inscription au foyer</h1>
		<img src="2021-04-04.png" alt="logo foyer">
		<table>
			<tr>
				<th class='jr-sema'>Horaire</th>
<?php 
	foreach ($select_js as $row1){
		echo "<th class='jr-sema'>".$row1['jour-semaine']."</th>";
	}
?>
			</tr>
<?php
	foreach ($select_ph as $row){
		echo "<tr>
					<th class='plg-hora'>".$row['plage_horaire']."</th>
			";
		foreach ($select_js as $row3){
			$select_chaque_prsn_du_jour = $db->query("SELECT * FROM `foyer_insr`, `foyer_jour_semaine`, `foyer_plage_horaire` WHERE foyer_jour_semaine.id_js = foyer_insr.id_js AND foyer_plage_horaire.id_ph = foyer_insr.id_ph AND foyer_jour_semaine.id_js = ".$row3['id_js']." AND foyer_plage_horaire.id_ph = ".$row['id_ph'])->fetchAll();
			echo "<th>";
			foreach ($select_chaque_prsn_du_jour as $cle => $row2){
				$afficher = $row2['prenom_foyer']." ".$row2['nom_foyer'] ;
				if($cle > 0){
					echo ", ".$afficher;
				}else{
					echo $afficher;
				}
			}
			echo "</th>";
		}
		echo "</tr>";
	}
?>
			
		</table>
		<br>
		<div id="div-form1">
			<h2>Pour s'inscrire à une plage horaire, utilisez ce formulaire</h2>
			<form action="ajt_prsn.php" method="post">
				<label for="jour">Jour* : </label>
				<select name="jour">
<?php
	foreach ($select_js as $valeur_js) {
    	echo '<option value="'.$valeur_js["id_js"].'">'.$valeur_js['jour-semaine'].'</option>';
	}
?>
				</select>
				<br><br>
				<label for="heure">Horaire* : </label>
				<select name="heure">
<?php
	foreach ($select_ph as $valeur_ph) {
    	echo '<option value="'.$valeur_ph["id_ph"].'">'.$valeur_ph['plage_horaire'].'</option>';
	}
?>
				</select>
				<br><br>
				<label for="nom">Nom* : </label><input name="nom" type="text" maxlength="20" size="20" required>
				<br><br>
				<label for="prenom">Prénom* : </label><input name="prenom" type="text" maxlength="20" size="20" required>
				<br><br>
				<div class="g-recaptcha" data-callback data-sitekey="<?php echo $site_key; ?>" data-theme="dark"></div>
				<input class="bt" type="submit" value="S'inscrire">
			</form>
		</div>
<!--

-----------------Deuxiéme formulaire !!!!!!!------------------

-->
		<div id="div-form2">
			<h2>Pour suprimer une inscription, utilisez ce formulaire</h2>
			<form action="spr_prsn.php" method="post">
				<label for="prsn">Suprimer* : </label>
				<select name="prsn">
<?php
	$select_chaque_prsn =$db->query("SELECT * FROM `foyer_insr`, `foyer_jour_semaine`, `foyer_plage_horaire` WHERE foyer_jour_semaine.id_js = foyer_insr.id_js AND foyer_plage_horaire.id_ph = foyer_insr.id_ph")->fetchAll();
	foreach ($select_chaque_prsn as $row4){
		echo "<option value='".$row4['id_foyer']."'>".$row4['prenom_foyer']." ".$row4['nom_foyer']." le ".strtolower($row4['jour-semaine'])." de ".$row4['plage_horaire']."</option>";
	}
	include ('footer.php')
?>
				</select>
				<br><br>
				<label for="pass">Mot de passe* : </label><input name="pass" type="password" required>
				<br><br>
				<div class="g-recaptcha" data-callback data-sitekey="<?php echo $site_key; ?>" data-theme="dark"></div>
				<input class="bt" type="submit" value="Suprimer">
			</form>
		</div>
	</body>
</html>