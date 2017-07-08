<?php

include("../connexion/connexion.php");
include("../block/header.php");



?>

<a href="../pages/liste_cresa.php"> Retour </a>

<h2> N° Entree_CRESA :  </h2>
<?php



$res = mysqli_query($dbb, "SELECT * FROM materiels WHERE id = " .$_GET['id']);



                      while($donnees = mysqli_fetch_array($res))
                      {
                        echo $donnees['Urgence'];
                      }





?>
