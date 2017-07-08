<?php   // mise en archive par erreur

include ("../connexion/connexion.php");
include("../block/header.php");

$id= $_GET["id"];

  $req = mysqli_query($dbb, "UPDATE materiels SET Archive = 1 WHERE id = ".$id);

  if($req == true)

  {
    echo 'Matériel désarchivé avec succès. </br>
          <a href="../pages/archive.php" onclick="window.location.reload(false)">Retour à la liste du matériel </a>';
  }
  else
  {
    echo "Erreur lors de l'ajout du matériel";
  }


 ?>
