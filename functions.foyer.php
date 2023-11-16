<?php

	function afficher_head($title, $fichiers_css, $charset)
	{
		echo '<title>'.$title.'</title>
		';
		echo '<meta charset="'.$charset.'">
		';
		echo '<link rel="icon" type="image/ico" href="2021-04-04.png">
		';
// et maintenant, il va falloir parcourir le tableau passé dans la fonction pour pouvoir générer autant de ligne que d'occurence dans le tableau
// TODO --->  astuce ---> utiliser la fonction foreach 
		foreach ($fichiers_css as $nom_fichier_css) 
		{
			echo '<link rel="stylesheet" href="'.$nom_fichier_css.'">
			';
		}
		echo '<script type="text/javascript" src="tarteaucitron/tarteaucitron.js"></script>

        <script type="text/javascript">
        tarteaucitron.init({
    	  "privacyUrl": "", /* Privacy policy url */

    	  "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
    	  "cookieName": "tarteaucitron", /* Cookie name */
    
    	  "orientation": "middle", /* Banner position (top - bottom) */
       
          "groupServices": false, /* Group services by category */
                           
    	  "showAlertSmall": true, /* Show the small banner on bottom right */
    	  "cookieslist": true, /* Show the cookie list */
                           
          "closePopup": false, /* Show a close X on the banner */

          "showIcon": true, /* Show cookie icon to manage cookies */
          "iconSrc": "2021-04-04.png", /* Optionnal: URL or base64 encoded image */
          "iconPosition": "BottomLeft", /* BottomRight, BottomLeft, TopRight and TopLeft */

    	  "adblocker": true, /* Show a Warning if an adblocker is detected */
                           
          "DenyAllCta" : false, /* Show the deny all button */
          "AcceptAllCta" : true, /* Show the accept all button when highPrivacy on */
          "highPrivacy": true, /* HIGHLY RECOMMANDED Disable auto consent */
                           
    	  "handleBrowserDNTRequest": false, /* If Do Not Track == 1, disallow all */

    	  "removeCredit": false, /* Remove credit link */
    	  "moreInfoLink": true, /* Show more info link */

          "useExternalCss": false, /* If false, the tarteaucitron.css file will be loaded */
          "useExternalJs": false, /* If false, the tarteaucitron.js file will be loaded */

    	  // "cookieDomain": "malomouron.fr/quiz/lien-bandeau.php", /* Shared cookie for multisite */
                          
          "readmoreLink": "", /* Change the default readmore link */

          "mandatory": false, /* Show a message about mandatory cookies */
        });
        </script>
		<script type="text/javascript">
			tarteaucitron.user.gajsUa = \'UA-159054530-1\';
			tarteaucitron.user.gajsMore = function () { /* add here your optionnal _ga.push() */ };
			(tarteaucitron.job = tarteaucitron.job || []).push(\'gajs\');
			(tarteaucitron.job = tarteaucitron.job || []).push(\'recaptcha\');
			(tarteaucitron.job = tarteaucitron.job || []).push(\'youtube\');
		</script>';
	}
	include 'db.foyer.php';
?>