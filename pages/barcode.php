<?php /* *****************************************
 * exemple d'utilisation de pi_barcode.php
 * par pitoo.com
 * ***************************************** */
include('../barcode/pi_barcode.php');

include("../connexion/connexion.php");

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
  echo "<td>".$data['N°Entree_CRESA']."</td></br>";
  echo "<td>".$data['N°Contenu_CRESA']."</td></br>";
  echo "<td>".$data['Marque']."</td></br>";
  echo "<td>".$data['Autre_marque']."</td></br>";
  echo "<td>".$data['Modele_Type']."</td></br>";
  echo "<td>".$data['N°IMEI']."</td></br>";
  echo "<td>".$data['Titre']."</td></br>";
  echo "<td>".$data['N°de_Serie']."</td></br>";
  echo "<td>".$data['Description']."</td></br>";
  echo "<td>".$data['N°IMEI']."</td>";
  echo '<IMG src="../barcode/pi_barcode.php?type=C39&code='.$data["N°IMEI"].'">';
}


?>
