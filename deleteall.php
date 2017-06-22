<?php


include("connexion.php");


     //Tu recuperes l'id du contact
  
     //Requete SQL pour supprimer le contact dans la base
     $req = mysqli_query($dbb, "DELETE FROM materiels WHERE Archive = 0 ");
     //Et la tu rediriges vers ta page contacts.php pour rafraichir la liste

     if($req == true)

     {
       echo 'Matériel supprimé avec succès. </br>
             <a href="archive.php" onclick="window.location.reload(false)">Retour à la liste du matériel </a>';
     }
     else
     {
       echo "Erreur lors de la suppression du matériel";
     }
?>
