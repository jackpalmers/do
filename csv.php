<?php


function export_csv(){

  include("connexion.php");

    mysql_connect('localhost', 'root', '');
    mysql_select_db('do');

    // Titre des colonnes de votre fichier .CSV
    $fichier = "N°Entree_CRESA; N°IMEI; N°de_Serie";
    $fichier .= "\n";

    // Requête SQL
    $sql = "SELECT N°Entree_CRESA, N°IMEI, N°de_Serie FROM materiels";
    //$req = mysql_query($sql);
    $req = mysqli_query($dbb, $sql) or die(mysqli_error($dbb));

    // Enregistrement des résultats ligne par ligne
    while($row = mysqli_fetch_object($req)){
        $fichier .= "".$row->N°Entree_CRESA.";".$row->N°IMEI.";".$row->N°de_Serie."\n";
    }

    // Déclaration du type de contenu
    header("Content-type: application/text/csv; charset=utf8_decode");
    header("Content-disposition: attachment; filename=export_materiels.csv");
    print $fichier;
    exit;
}
export_csv();

?>
