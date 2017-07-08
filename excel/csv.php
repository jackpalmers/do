<?php


function export_csv(){

  include("../connexion/connexion.php");

    mysqli_connect('localhost', 'root', '');
    mysqli_select_db('do');

    // Titre des colonnes de votre fichier .CSV
    $fichier = "Num_Entree_CRESA; Num_IMEI; Num_de_Serie";
    $fichier .= "\n";

    // Requête SQL
    $sql = "SELECT Num_Entree_CRESA, Num_IMEI, Num_de_Serie FROM materiels";
    //$req = mysqli_query($sql);
    $req = mysqli_query($dbb, $sql) or die(mysqli_error($dbb));

    // Enregistrement des résultats ligne par ligne
    while($row = mysqli_fetch_object($req)){
        $fichier .= "".$row->Num_Entree_CRESA.";".$row->Num_IMEI.";".$row->Num_de_Serie."\n";
    }

    // Déclaration du type de contenu
    header("Content-type: application/text/csv; charset=utf8_decode");
    header("Content-disposition: attachment; filename=export_materiels.csv");
    print $fichier;
    exit;
}
export_csv();

?>
