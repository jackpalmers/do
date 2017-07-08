<?php

include("block/header-index.php");


session_start();


include("connexion/connexion.php");
include("pages/formulaire.php");



//Page à Ouvert si le get est present
if( isset($_GET["page"]) )
{
	$pageOuvrir = $_GET["page"];

}else {
	$pageOuvrir = "accueil";
}



if($dbb) mysqli_close($dbb);

include("block/footer.php");

?>
