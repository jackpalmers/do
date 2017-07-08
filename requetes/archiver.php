<?php

include ("../connexion/connexion.php");
include("../block/header.php");

$id= $_GET["id"];


      $req = mysqli_query($dbb, "UPDATE materiels SET Archive = 0 WHERE id = ".$id );

      if($req == true)

      {
        echo 'Matériel archivé avec succès. </br>
              <a href="../pages/materiels.php" onclick="window.location.reload(false)">Retour à la liste du matériel </a>';
      }
      else
      {
        echo "Erreur lors de l'archivation du matériel";
      }



 ?>
