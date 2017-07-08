<?php /* *****************************************
 * exemple d'utilisation de pi_barcode.php
 * par pitoo.com
 * ***************************************** */
include('../barcode/pi_barcode.php');
include("../connexion/connexion.php");
include("../block/header.php");

echo '<a href="materiels.php" onclick="window.location.reload(false)">Retour</a>';

echo '</br>';

$id = $_GET["id"];

// instanciation
$bc = new pi_barcode();


$res = mysqli_query($dbb, "SELECT * FROM materiels WHERE id = " .$_GET['id']);


while($data = mysqli_fetch_array($res))

{
  echo "<td>".$data['Urgence']."</td></br>";
  echo "<td>".$data['Etat_du_dossier']."</td></br>";
  echo "<td>".$data['Zone_de_stockage']."</td></br>";
  echo "<td>".$data['Num_Entree_CRESA']."</td></br>";
  echo "<td>".$data['Num_Contenu_CRESA']."</td></br>";
  echo "<td>".$data['Marque']."</td></br>";
  echo "<td>".$data['Autre_marque']."</td></br>";
  echo "<td>".$data['Modele_Type']."</td></br>";
  echo "<td>".$data['Num_IMEI']."</td></br>";
  echo "<td>".$data['Titre']."</td></br>";
  echo "<td>".$data['Num_de_Serie']."</td></br>";
  echo "<td>".$data['Description']."</td></br>";
  echo "<td>".$data['Num_IMEI']."</td>";
  echo '<IMG src="../barcode/pi_barcode.php?type=C39&code='.$data["Num_IMEI"].'">';
}


?>
