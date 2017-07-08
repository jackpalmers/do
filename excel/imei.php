<?php        // Ecresa = Entrée CRESA           ?>


<?php

include("../connexion/connexion.php");

$res = $dbb->query("SELECT Num__Entree_CRESA, Num_IMEI, Num_de_Serie FROM materiels");


?>

<a href="../index.php" onclick='window.location.reload(false)'>Accueil</a>


<h1>Liste matériels <a href="csv.php" class="button action" >Export CSV</a></h1>
<table class="wp-list-table widefat fixed users">

                <tr>
                    <td> N° Entrée CRESA </td>
                    <td> N° IMEI </td>
                    <td> N° de série </td>
                </tr>

                <?php
            while($donnees = mysqli_fetch_array($res))
            {
            ?>
                <tr>
                    <td><?php echo $donnees['Num_Entree_CRESA'];?></td>
                    <td><?php echo $donnees['Num_IMEI'];?></td>
                    <td><?php echo $donnees['Num_de_Serie'];?></td>
                </tr>
            <?php
            }
            ?>
