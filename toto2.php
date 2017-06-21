<?php

include("connexion.php");


foreach ($_POST['delete'] as $id){

$sql=mysqli_query($dbb, "UPDATE materiels SET Archive = 0 WHERE id = ".$id );




if($sql == true)

{
  echo 'Matériels archivés avec succès. </br>
        <a href="archive.php" onclick="window.location.reload(false)">Retour à la liste du matériel </a>';
}
else
{
  echo "Erreur lors de l'archivage du matériels";
}


}


?>
