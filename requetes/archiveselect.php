<a href="../pages/materiels.php" onclick='window.location.reload(false)'>Retour</a>

<?php

include('../connexion/connexion.php');
include("../block/header.php");

$delete = isset($_POST['delete']) ? $_POST['delete'] : array();
$valeur = isset($_POST['valeur']) ? $_POST['valeur'] : array();


if (sizeof($delete)==0){
echo 'Vous n\'avez pas selectionné de matériels';
exit;}
else{


foreach ($delete as $valeur){
$sql= mysqli_query($dbb,"SELECT * FROM materiels WHERE Archive = 1 AND id='$valeur'");

while ($data = mysqli_fetch_array($sql))

{

echo 'Les enregistrements ont été archivés';

echo ' - ';
echo $data['id'];
echo " - ";
echo $data["Num_Entree_CRESA"];
echo $data["Num_Contenu_CRESA"];
echo $data["Modele_Type"];
echo $data["Num_IMEI"];
echo $data["Num_de_Serie"];
echo $data["Description"];

}
}
}

?>
