<?php

include("connexion/connexion.php");

$res = $dbb->query("SELECT * FROM materiels");

?>



<!-- Bouton accueil -->
<a href="../index.php" onclick='window.location.reload(false)'>Accueil</a>



<!-- DEBUT Formulaire ajout fichier excel -> bdd -->


<form enctype="multipart/form-data" action="../excel/excel.php" method="POST">
 <p><input name="file" type="file" />
 <p><input type="submit" value="Importer" onclick='window.location.reload(false)' /></p>
</form>

<!-- FIN Formulaire ajout fichier excel -> bdd  -->


                                                                                <!--  DEBUT 2eme formulaire -->


<p>
   <a class="btn btn-info" href="pages/materiels.php">  Liste de tout le matériel </a>
</p>



                                                                                <!--  FIN 2eme formulaire -->


                                                                                <!-- DEBUT Formulaire Garage (arriver après import) -->

<a class="btn btn-info" href="pages/garage.php">Liste garage</a>
                                                                                <!-- FIN Formulaire Garage -->
</br>
                                                                                <!-- Debut formulaire materiel archivé -->

<a class="btn btn-info" href="pages/archive.php">Archive </a>
                                                                                    <!-- Fin formulaire Archive -->

<?php //-----------------------------------------------------FORMULAIRE AJOUTER--------------------------------------------------- ?>

<form method="post" action="../excel/imei.php">
<p>
    <input type="submit" value="Liste N°IMEI -> export" />

</p>

</form>

<!--
                                    Update XML -> CSV

<form method="post" action="xls/convert.php">
<p>

  <input type="submit" value="Update csv" />

</p>
</form> -->



<h3>Ajouter un produit</h3>


<?php


if(isset($_POST["ajoute"]))
	{
		//on éxécute la requête, en sécurisant les champs saisis par l'utilisateur
		$resultat = mysqli_query( $dbb, " INSERT INTO materiels(Urgence, Etat_du_dossier, Zone_de_stockage, N°Entree_CRESA, N°Contenu_CRESA, Marque,
                                                  Autre_marque, Modele_Type, N°IMEI, Titre, N°de_serie, Description, Archive)

    VALUES( '".$_POST["urgence"]."', '".$_POST["etat"]."', '".$_POST["stockage"]."', '".$_POST["entree"]."', '".$_POST["contenu"]."',
    '".$_POST["marque"]."', '".$_POST["autre"]."', '".$_POST["modele"]."', '".$_POST["imei"]."', '".$_POST["titre"]."',
    '".$_POST["serie"]."', '".$_POST["description"]."', 1 )  ") or die(mysqli_error($dbb));

		if(!$resultat)
		{

			echo '<div class="alert alert-danger" role="alert">Une erreur c\'est produite lors de l\'ajout de votre materiel</div>';

		} else
		{
			echo '<div class="alert alert-success" role="alert">Materiel ajoutée avec succès</div>';
		}
	}

?>



<form id="ajoute" method="post" class='last' action="index.php?page=accueil#ajoute">

  <div class="input-group">
    <span class="input-group-addon" id="basic-addon3">Urgence : </span>
    <input type="text" class="form-control" name="urgence" placeholder="Urgence">

    <span class="input-group-addon" id="basic-addon3">Etat du dossier : </span>
    <input type="text" class="form-control" name="etat" placeholder="Etat du dossier">

    <span class="input-group-addon" id="basic-addon3">Zone de stockage : </span>
    <input type="text" class="form-control" name="stockage" placeholder="Zone de stockage">

    <span class="input-group-addon" id="basic-addon3">N° Entrée CRESA : </span>
    <input type="text" class="form-control" name="entree" placeholder="N°Entrée CRESA">
  </div>

<?php echo "</br>"; ?>

  <div class="input-group">
    <span class="input-group-addon" id="basic-addon3">N° Contenu CRESA : </span>
    <input type="text" class="form-control" name="contenu" placeholder="N° Contenu CRESA">

    <span class="input-group-addon" id="basic-addon3">Marque : </span>
    <input type="text" class="form-control" name="marque" placeholder="Marque">

    <span class="input-group-addon" id="basic-addon3">Autre marque : </span>
    <input type="text" class="form-control" name="autre" placeholder="Autre marque">

    <span class="input-group-addon" id="basic-addon3">Modèle/Type : </span>
    <input type="text" class="form-control" name="modele" placeholder="Modèle/Type">
  </div>

<?php echo "</br>"; ?>

<div class="input-group">
  <span class="input-group-addon" id="basic-addon3">N° IMEI : </span>
  <input type="text" class="form-control" name="imei" placeholder="N° IMEI">

  <span class="input-group-addon" id="basic-addon3">Titre : </span>
  <input type="text" class="form-control" name="titre" placeholder="Titre">

  <span class="input-group-addon" id="basic-addon3">N° de série : </span>
  <input type="text" class="form-control" name="serie" placeholder="N° de série">

  <span class="input-group-addon" id="basic-addon3">Description : </span>
  <input type="text" class="form-control" name="description" placeholder="Description">
</div>

<?php echo "</br>"; ?>

<button type="submit" name="ajoute" class="btn btn-block btn-warning">Ajouter</button>

</form>

<?php // ---------------------------------------------------FORMULAIRE SUPPRIMER---------------------------------------------------------- ?>
