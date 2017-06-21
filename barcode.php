<?php /* *****************************************
 * exemple d'utilisation de pi_barcode.php
 * par pitoo.com
 * ***************************************** */
include('pi_barcode.php');

include("connexion.php");

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
  echo '<IMG src="pi_barcode.php?type=C39&code='.$data["N°IMEI"].'">';
}

// Le code a générer
// $bc->setCode = '.$data["N°IMEI"].';

// $bc->setCode('64994848948484');

// Type de code : EAN, UPC, C39...
$bc->setType('C39');

// taille de l'image (hauteur, largeur, zone calme)
//    Hauteur mini=15px
//    Largeur de l'image (ne peut être inférieure a
//        l'espace nécessaire au code barres
//    Zones Calmes (mini=10px) à gauche et à droite
//        des barres
$bc->setSize(80, 150, 10);

// Texte sous les barres :
//    'AUTO' : affiche la valeur du codes barres
//    '' : n'affiche pas de texte sous le code
//    'texte a afficher' : affiche un texte libre
//        sous les barres
$bc->setText('AUTO');

// Si elle est appelée, cette méthode désactive
// l'impression du Type de code (EAN, C128...)
$bc->hideCodeType();

// Couleurs des Barres, et du Fond au
// format '#rrggbb'
$bc->setColors('#123456', '#F9F9F9');
// Type de fichier : GIF ou PNG (par défaut)
$bc->setFiletype('PNG');

// envoie l'image dans un fichier
$bc->writeBarcodeFile('barcode.png');
// ou envoie l'image au navigateur
// $bc->showBarcodeImage();

/* ***************************************** */

$res = mysqli_query($dbb, "SELECT * FROM materiels WHERE id = " .$_GET['id']);

$data = mysqli_fetch_array($res);

echo '<td><a href="barcode.png?id='.$data['id'].'" >
<input type="submit" name="Envoyer" value="Envoyer" class="btn btn-block btn-warning" /></a>'
?>
