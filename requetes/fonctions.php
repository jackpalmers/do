<?php

include("../connexion/connexion.php");

$id= $_GET["id"];


      function ajouter()

    {

      $req = mysqli_query($dbb, "UPDATE materiels SET Archive = 1 WHERE id = ".$id );

      if($req == true)

      {
        echo 'Matériel archivé avec succès. </br>
              <a href="../pages/garage.php" onclick="window.location.reload(false)">Retour à la liste du matériel </a>';
      }
      else
      {
        echo "Erreur lors de l'archivation du matériel";
      }

    }

 ?>
