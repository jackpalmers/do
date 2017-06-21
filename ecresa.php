<?php        // Ecresa = Entrée CRESA           ?>

<body>
<?php

include("connexion.php");

$res = $dbb->query("SELECT * FROM materiels");


?>

<input type="button" value="Retour" onclick="history.go(-1)">

<table>
                <tr>
                    <td> N° Entrée CRESA </td>
                </tr>

                <?php
            while($donnees = mysqli_fetch_array($res))
            {
            ?>
                <tr>
                    <td><?php echo $donnees['N°Entree_CRESA'];?></td>
                </tr>
            <?php
            }

            ?>

</table>
</body>
