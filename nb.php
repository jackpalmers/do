<?php

include ("connexion.php");


$sql = 'SELECT * FROM materiels';
$req = mysqli_query($dbb, $sql);
while($data = mysqli_fetch_assoc($req)) {
    echo 'pour le materiel avec l id '.htmlspecialchars(stripslashes($data['id'])).'<br/>';
    $nb = 0;
    // $totalimei = (!empty($data['N°IMEI']));
    if(!empty($data['N°IMEI'])) {
        echo 'Il manque le N°IMEI.  ';
        $nb++;
    }
    if(!empty($data['N°Entree_CRESA'])) {
        echo 'Il manque le N° Entree_CRESA. ';
        $nb++;
    }
    if(!empty($data['Modele_Type'])) {
        echo ' Il manque le Modele_Type. ';
        $nb++;
    }

    echo 'Il y a '.$nb.' champs vides ';

}




  $res = mysqli_query($dbb, 'SELECT N°IMEI FROM materiels WHERE N°IMEI = "" ');

  $donnees = mysqli_num_rows($res);

  mysqli_free_result($res);


  if($donnees <= 0)
  {
    echo "Il n'y a aucun champs vide";
  }
  else
  {
    echo "Il manque ".$donnees." N°IMEI";
  }


?>
