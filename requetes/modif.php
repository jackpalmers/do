<?php

include("../connexion/connexion.php");


$id = $_GET["id"];

// $urgence = isset($_POST['urgence']);


$urgence = $_POST["urgence"];
$etat = $_POST["etat"];
$stockage = $_POST["stockage"];
$entree = $_POST["entree"];
$contenu = $_POST["contenu"];
$marque = $_POST["marque"];
$autre = $_POST["autre"];
$modele = $_POST["modele"];
$imei = $_POST["imei"];
$titre = $_POST["titre"];
$serie = $_POST["serie"];
$description = $_POST["description"];


if(isset($_POST['modifier'])) {

		$res = mysqli_query($dbb,"UPDATE materiels SET  Urgence='$urgence',
																		Etat_du_dossier='$etat',
																		Zone_de_stockage='$stockage',
																		N°Entree_CRESA='$entree',
																		N°Contenu_CRESA='$contenu',
																		Marque='$marque',
																		Autre_marque='$autre',
																		Modele_Type='$modele',
																		N°IMEI='$imei',
																		Titre='$titre',
																		N°de_Serie='$serie',
																		Description='$description'
																		WHERE id =" .$id);


		if(!$res)
		{

			echo '<div class="alert alert-danger" role="alert">Une erreur c\'est produite lors de la modification de votre materiel</div>';

		} else
		{
			echo '<div class="alert alert-success" role="alert">Materiel modifié avec succès</div>';
		}
}

?>

<br/>
<a href="../pages/materiels.php"> Retour </a>
