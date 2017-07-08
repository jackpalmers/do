<?php


include("connexion.php");
include("../block/header.php");



if(isset($_POST['delete']))
{
    $checkbox = $_POST['delete'];

for($i=0;$i<count($checkbox);$i++){

$del_id = $checkbox[$i];
  $req= mysqli_query($dbb, "UPDATE materiels SET Archive = 0 WHERE id = ".$del_id );

}
// if successful redirect to delete_multiple.php
if($req == true)

{
  echo 'Matériels archivés avec succès. </br>
        <a href="archive.php" onclick="window.location.reload(false)">Retour à la liste du matériel </a>';
}
else
{
  echo "Erreur lors de l'archivage du matériels";
}

 }


//
//
//
// $id= $_GET["id"];
//
//
// foreach($_POST['delete'] as $id)
// {
//
//   $req= mysqli_query($dbb, "UPDATE materiels SET Archive = 0 WHERE id = ".$id );
//
//
//   if($req == true)
//
//   {
//     echo 'Matériels archivés avec succès. </br>
//           <a href="archive.php" onclick="window.location.reload(false)">Retour à la liste du matériel </a>';
//   }
//   else
//   {
//     echo "Erreur lors de l'archivage du matériels";
//   }
//
//
//
// }

//
//
// $req= mysqli_query($dbb, "UPDATE materiels SET Archive = 0 WHERE id = ".$id );
//
//
// if($req == true)
//
// {
//   echo 'Matériels archivés avec succès. </br>
//         <a href="archive.php" onclick="window.location.reload(false)">Retour à la liste du matériel </a>';
// }
// else
// {
//   echo "Erreur lors de l'archivage du matériels";
// }
//




?>
