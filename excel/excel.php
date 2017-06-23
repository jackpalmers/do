<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-theme.css" />
<header class="block-header">

  <div class="head">
    <h1 class="title1"> <a href="../index.php">Accueil</a> </h1>
    <div class="slogan"></div>
  </div>

</header>

<?php

header('Content-Type: text/html; charset=UTF-8');

include("../connexion/connexion.php");




mysqli_set_charset($dbb, 'utf8');

function NoAccent($texte)
{
$acc='Âàáâãäåòóôõöøéèêëìíîïùúûüÿ';
$noacc='Âaaaaaaooooooeeeeiiiiuuuuy';
$texte = strtr($texte,$acc,$noacc);
return $texte;
}
function enlever($text)
{
$liste = array(' ','-','_',')','(',']','[',':',',','!',"'",'/','?',',');
$text=str_replace($liste,'',$text);
$text=str_replace('$','s',$text);
$text=strtolower($text);
$text=NoAccent($text);
return $text;
}


if($_FILES["file"]["type"] != "application/vnd.ms-excel"){											// Si le fichier n'est pas au format csv,
	die("Aucun fichier ou fichier au mauvais format sélectionné");								// echo erreur
}
elseif(is_uploaded_file($_FILES['file']['tmp_name'])){													// sinon
 mysqli_select_db($dbb, "do");
 mysqli_set_charset($dbb, 'utf8');


 echo "Fichier ajouté à la base de donnée";																			// echo c est bon


$handle = fopen($_FILES['file']['tmp_name'], "r");
// $handle = fopen("import.csv", "r");
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {

			$datarow = array_map("utf8_encode", $data);
			print_r($datarow);


			$att0 = mysqli_escape_string($dbb, $data[0]);
			$att1 = mysqli_escape_string($dbb, $data[1]);
			$att2 = mysqli_escape_string($dbb, $data[2]);
			$att3 = mysqli_escape_string($dbb, $data[3]);
			$att4 = mysqli_escape_string($dbb, $data[4]);
			$att5 = mysqli_escape_string($dbb, $data[5]);
			$att6 = mysqli_escape_string($dbb, $data[6]);
			$att7 = mysqli_escape_string($dbb, $data[7]);
			$att8 = mysqli_escape_string($dbb, $data[8]);
			$att9 = mysqli_escape_string($dbb, $data[9]);
			$att10 = mysqli_escape_string($dbb, $data[10]);
			$att11 = mysqli_escape_string($dbb, $data[11]);



			$sql = "INSERT INTO materiels (Urgence, Etat_du_dossier, Zone_de_stockage, N°Entree_CRESA, N°Contenu_CRESA, Marque,
	                            			 Autre_marque, Modele_Type, N°IMEI, Titre, N°de_serie, Description)
						VALUES ('" . $att0 . "', '" . $att1 . "', '" . $att2 . "', '" . $att3 . "', '" . $att4 . "', '" . $att5 . "'
						, '" . $att6 . "', '" . $att7 . "', '" . $att8 . "', '" . $att9 . "', '" . $att10 . "', '" . $att11 . "')";
			mysqli_query($dbb, $sql);

			//utf8_encode(fgets($_FILES));


		}


}



mysqli_close($dbb);
