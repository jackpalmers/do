<?php

include("connexion.php");

$id = $_GET['id'];

?>

<a href="materiels.php"> Retour </a>

<?php



$res = mysqli_query($dbb, "SELECT * FROM materiels WHERE Archive = 2 AND id = " .$_GET['id']);

      $donnees = mysqli_fetch_array($res);


                  if(isset($_POST['modifier'])) {

                      $query = "UPDATE materiels SET  Urgence='".addslashes($_POST['urgence'])."',
                                                      Etat_du_dossier='".addslashes($_POST['etat'])."',
                                                      Zone_de_stockage='".addslashes($_POST['stockage'])."',
                                                      N°Entree_CRESA='".addslashes($_POST['entree'])."',
                                                      N°Contenu_CRESA='".addslashes($_POST['contenu'])."',
                                                      Marque='".addslashes($_POST['marque'])."',
                                                      Autre_marque='".addslashes($_POST['autre'])."',
                                                      Modele_Type='".addslashes($_POST['modele'])."',
                                                      N°IMEI='".addslashes($_POST['imei'])."',
                                                      Titre='".addslashes($_POST['titre'])."',
                                                      N°de_Serie='".addslashes($_POST['serie'])."',
                                                      Description='".addslashes($_POST['description '])."',
                                                      WHERE id='".$_GET['id']."'";
                      echo $query;
                      $res = mysqli_query($dbb, $query);

                      if(!$res)
                  		{

                  			echo '<div class="alert alert-danger" role="alert">Une erreur c\'est produite lors de l\'ajout de votre materiel</div>';

                  		} else
                  		{
                  			echo '<div class="alert alert-success" role="alert">Materiel ajoutée avec succès</div>';
                  		}
                  }




?>


<form id="modifier" class="last" method="post" action="modifgarage.php?id=<?php echo $donnees["id"]; ?> ">

  <?php

  echo ' <div class="input-group">
    <span class="input-group-addon" id="basic-addon3">Urgence : </span>
    <input type="text" class="form-control" name="urgence" value="'.$donnees['Urgence'].'" placeholder="Urgence">

    <span class="input-group-addon" id="basic-addon3">Etat du dossier : </span>
    <input type="text" class="form-control" name="etat" value="'.$donnees['Etat_du_dossier'].'" placeholder="Etat du dossier">

    <span class="input-group-addon" id="basic-addon3">Zone de stockage : </span>
    <input type="text" class="form-control" name="stockage" value="'.$donnees['Zone_de_stockage'].'" placeholder="Zone de stockage">

    <span class="input-group-addon" id="basic-addon3">N° Entrée CRESA : </span>
    <input type="text" class="form-control" name="entree" value="'.$donnees['N°Entree_CRESA'].'" placeholder="N°Entrée CRESA">
  </div>';



 echo "</br>";

  echo '<div class="input-group">
    <span class="input-group-addon" id="basic-addon3">N° Contenu CRESA : </span>
    <input type="text" class="form-control" name="contenu" value="'.$donnees['N°Contenu_CRESA'].'" placeholder="N° Contenu CRESA">

    <span class="input-group-addon" id="basic-addon3">Marque : </span>
    <input type="text" class="form-control" name="marque" value="'.$donnees['Marque'].'" placeholder="Marque">

    <span class="input-group-addon" id="basic-addon3">Autre marque : </span>
    <input type="text" class="form-control" name="autre" value="'.$donnees['Autre_marque'].'" placeholder="Autre marque">

    <span class="input-group-addon" id="basic-addon3">Modèle/Type : </span>
    <input type="text" class="form-control" name="modele" value="'.$donnees['Modele_Type'].'" placeholder="Modèle/Type">
  </div>';

 echo "</br>";

echo '<div class="input-group">
  <span class="input-group-addon" id="basic-addon3">N° IMEI : </span>
  <input type="text" class="form-control" name="imei" value="'.$donnees['N°IMEI'].'" placeholder="N° IMEI">

  <span class="input-group-addon" id="basic-addon3">Titre : </span>
  <input type="text" class="form-control" name="titre" value="'.$donnees['Titre'].'" placeholder="Titre">

  <span class="input-group-addon" id="basic-addon3">N° de série : </span>
  <input type="text" class="form-control" name="serie" value="'.$donnees['N°de_Serie'].'" placeholder="N° de série">

  <span class="input-group-addon" id="basic-addon3">Description : </span>
  <input type="text" class="form-control" name="description" value="'.$donnees['Description'].'" placeholder="Description">
</div>';

echo "</br>"; ?>

<td><a href="modifgarage.php?id=<?php echo $donnees["id"]; ?> " >
<input type="submit" name="modifier" value="Modifier" class="btn btn-block btn-warning" /></a>





</form>
