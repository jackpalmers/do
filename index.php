<!-- Debut bouton rafraichir -->
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-theme.css" />
</head>
<input type="button" onclick='window.location.reload(false)' value="Rafraichir"/>

<!-- Fin bouton rafraichir -->

<?php

session_start();

error_reporting(-1);

include("connexion.php");
include("formulaire.php");


//Page à Ouvert si le get est present
if( isset($_GET["page"]) )
{
	$pageOuvrir = $_GET["page"];

}else {
	$pageOuvrir = "accueil";
}



if($dbb) mysqli_close($dbb);


?>
