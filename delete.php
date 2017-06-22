<?php

include("connexion.php");


     //Tu recuperes l'id du contact
     $id = $_GET["id"];
     //Requete SQL pour supprimer le contact dans la base
     $res = mysqli_query($dbb, "DELETE FROM materiels WHERE id = ".$id );
     //Et la tu rediriges vers ta page contacts.php pour rafraichir la liste

     if($res == true)

     {
       echo 'Matériel archivé avec succès. </br>
             <a href="archive.php" onclick="window.location.reload(false)">Retour à la liste du matériel </a>';
     }
     else
     {
       echo "Erreur lors de l'ajout du matériel";
     }
?>
