<?php

include('connexion.php');

$query = "
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET time_zone = '+00:00';
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
CREATE TABLE `materiels` (
  `id` int(11) NOT NULL,
  `Urgence` varchar(255) NOT NULL,
  `Etat_du_dossier` varchar(255) NOT NULL,
  `Zone_de_stockage` varchar(255) NOT NULL,
  `Num_Entree_CRESA` varchar(255) NOT NULL,
  `Num_Contenu_CRESA` varchar(255) NOT NULL,
  `Marque` varchar(255) NOT NULL,
  `Autre_marque` varchar(255) NOT NULL,
  `Modele_Type` varchar(255) NOT NULL,
  `Num_IMEI` varchar(255) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Num_de_Serie` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Archive` int(10) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `materiels`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `materiels`
 MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
";
$result = $dbb->multi_query($query);
if($result){
    echo 'table materiels créée';
}
else{
    echo 'une erreur s\'est produite durant la création de la table materiels';
    var_dump(mysqli_error($dbb));
}


?>
