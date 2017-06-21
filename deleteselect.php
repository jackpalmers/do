<a href="archive.php" onclick='window.location.reload(false)'>Retour</a>

<?php

include('connexion.php');

$delete = isset($_POST['delete']) ? $_POST['delete'] : array();
$valeur = isset($_POST['valeur']) ? $_POST['valeur'] : array();


if (sizeof($delete)==0){
echo 'Vous n\'avez pas selectionné de matériels';
exit;}
else{


foreach ($delete as $valeur){
  //Requete SQL pour supprimer le contact dans la base
$sql= mysqli_query($dbb,"DELETE FROM materiels WHERE id='$valeur'");


}

echo 'Les enregistrements ont été supprimés';

}

?>
