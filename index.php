<!-- Debut bouton rafraichir -->
<?php

include("block/header.php");


 ?>

<input type="button" onclick='window.location.reload(false)' value="Rafraichir"/>

<!-- Fin bouton rafraichir -->

<?php

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
